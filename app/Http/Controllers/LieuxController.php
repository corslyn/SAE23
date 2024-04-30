<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use Illuminate\Http\Request;
use App\Http\Requests\AjoutLieuxRequest;
use App\Http\Requests\AjoutVehiculeRequest;
use App\Models\Utilisateurs;
use Dflydev\DotAccessData\Util;

class LieuxController extends Controller
{
    public function show() {
        $lieux = Lieu::where("id_utilisateur", session("id")) -> get();
        $have_dp = Lieu::where("est_domicile", true) -> where("id_utilisateur", session("id")) -> get() -> count();

        return view("app.lieux", [
            "lieux" => $lieux,
            "already_have_domicile" => $have_dp,
        ]);
    }   

    public function create(AjoutLieuxRequest $request) {
        $is_domicile_principale = $request -> has("checkbox");

        if(
            // Si on n'essaye pas d'ajouter un domaine principal, si on essaye d'ajouter un lieu
            $is_domicile_principale === false
            // Et qu'on n'a pas de véhicule
            && session() -> has("id_vehicule") === false
        ) {
            return back() -> withErrors([
                "error" => "Vous ne pouvez pas ajouter de lieux autre que votre domicile principal, car vous n'avez pas de voiture", 
            ]);
        } 

        // Dp = domicile principal
        $have_dp = Lieu::where("est_domicile", true) -> where("id_utilisateur", session("id")) -> get() -> count();
        if(
            // Si on a déja set un domaine principale
            $have_dp && 
            // et qu'on n'essaye pas d'ajouter un domaine principal, qu'on on essaye d'ajouter un lieu
            $is_domicile_principale
        ) {
            return back() -> withErrors([ "error" => "Vous ne pouvez pas ajouter un lieu de domicile principal car vous en avez déjà un.", ]);
        }

        Lieu::create([
            "adresse" => $request["adresse"],
            "code_postal" => $request["postal"],
            "ville" => $request["ville"],
            "est_domicile" => $is_domicile_principale,
            "id_utilisateur" => session("id"),
        ]);
        
        return to_route("lieux.show");
    }

    public function delete(Lieu $lieux) {
        // Si l'utilisateur essaye de supprimer un lieu qui ne lui appartient pas
        if($lieux -> id_utilisateur !== session("id"))
            return abort(403);

        // On supprime le lieu de la table
        $lieux -> delete();
        return back();
    }
}
