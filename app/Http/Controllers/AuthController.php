<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginReq;
use App\Http\Requests\SignupReq;
use App\Models\Utilisateurs;

use RobThree\Auth\TwoFactorAuth;
use RobThree\Auth\Providers\Qr\BaconQrCodeProvider;


class AuthController extends Controller
{

    /**
     * Hash a basic string in double sha512 (sha512(sha512("the string")))
     *
     * @param string $to_hash       The string to hash
     *
     * @return                      The hash in sha512
     */
    private static function hash(string $to_hash) {
        return hash("sha512", hash("sha512", $to_hash));
    }


    /**
     * Log in a user
     *
     * @param LoginReq $request
     *
     * @return          Redirection to / or to /login with errors
     */
    public function login(LoginReq $request) {

        # Search for the username & password combination in the Utilisateurs table
        $data = Utilisateurs::where("email", "=", $request["email"]) 
                -> where("mot_de_passe", "=", self::hash($request["password"]))
                -> get() 
                -> toArray();
        
        
        // Si la DB ne renvoit rien, cela signifique que l'utilisateur n'existe pas
        if(empty($data)) {
            return to_route("auth.login") -> withErrors([
                "loginerror" => "Invalid username or password"
            ]);
        }

        // Sinon c'est que l'utilisateur existe, on va regarder si il a activé l'A2F ou pas
        
        // On recupère le premier record, qui sera notre user a logger
        $data = $data[0];

        // Alors l'utilisateur utilise l'A2F
        if($data["secret"] !== null) {
            
            // Il utilise l'A2F, mais il a laissé le champs "code A2F"
            // à 6 chiffres vide dans le formulaire
            if($request -> secret === null) {
                return to_route("auth.login") -> withErrors([
                    "secret" => "Vous utilisez l'A2F, vous ne pouvez pas laisser le champs Code vide !"
                ]);
            }

            // L'utilisateur utilise l'A2F, et a bien rempli le formulaire avec un code 
            
            $tfa = new TwoFactorAuth(new BaconQrCodeProvider());
            
            // on va vérifier si le code est correct
            if($tfa -> verifyCode($data["secret"], $request["secret"])) {
                
                // On log l'utilisateur                
                session($data);

                // Go to / page
                return to_route("index");
            } 
            else {
                return to_route("auth.login") -> withErrors([
                    "loginerror" => "Le code 2FA est invalide !"
                ]);
            }
        } 
        // L'utilisateur n'utilise pas l'A2F, on le connecte instantanément      
        else {
      
            # ( ID : NAME : EMAIL : PASSWORD (sha512) : TIMESTAMPS )
            session($data);

            # Go to / page
            return to_route("index");
        }


    }


    /**
     * Signup a user
     *
     * @param SignupReq $request
     * 
     * @return          Redirection to the login page with a success message 
     */
    public function signup(SignupReq $request) {

        $user = Utilisateurs::create([
            "email" => $request["email"],
            "nom" => $request["nom"],
            "sous_groupe" => $request["sous_groupe"],
            "id_vehicule" => null,
            "formation" => $request["formation"],
            "sous_groupe" => $request["sous_groupe"],
            "mot_de_passe" => self::hash($request["mot_de_passe"]),
            "secret" => null
        ]);
        
        // Cela signifique que l'utilisateur ne souhaite pas utiliser l'A2F
        if(!($request -> has("a2f"))) {
            return to_route("auth.login") -> with("success", "Votre compte a été créé avec succès !");
        }

        
        // Si on est ici, c'est que l'utilisateur a coché la case A2F
        $tfa = new TwoFactorAuth(new BaconQrCodeProvider());
        $secret = $tfa -> createSecret();
        $qrcode = $tfa->getQRCodeImageAsDataUri($request["email"], $secret);

        $user -> update([
            "secret" => $secret,
        ]);
        
        return view("auth.validate", [
            "secret" => $secret,
            "qrcode" => $qrcode,
        ]);
    }

}
