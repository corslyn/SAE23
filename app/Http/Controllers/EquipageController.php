<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEquipageRequest;
use App\Http\Requests\JoinEquipageRequest;
use App\Models\Equipages;
use App\Models\Rejoint;

class EquipageController extends Controller
{
    public function show() {
        $joined_equipe = Rejoint::where("id_utilisateur", session("id")) -> get();
        $leader_of_equipe = Rejoint::where("id_utilisateur", session("id")) -> where("est_chef", true) -> first();

        return view("app.equipage", [
            "joined_equipe" => $joined_equipe,
            "leader_of_equipe" => $leader_of_equipe,
        ]);
    }


    public function create(CreateEquipageRequest $request) {
        // On vérifie si l'utilisateur a une voiture, sinon il n'a pas le droit de créer
        // un équipage
        if(session("id_vehicule") === null) {
            return back() -> withErrors([
                "pas_de_tuturette" => "Vous n'avez pas de voiture, vous ne pouvez pas créer un équipage", 
            ]);
        }

        // On créé l'équipage
        $equipage = Equipages::create([
            "nom_equipage" => $request -> nom_equipage,
        ]);

        // On le fait rejoindre l'équipage en tant que chef
        Rejoint::create([
            "id_equipage" => $equipage -> id,
            "id_utilisateur" => session("id"),
            "est_chef" => true,
        ]);

        return back();
    }


    public function join(JoinEquipageRequest $request) {
        
        // Recuperer l'id l'equipage choisi a partir de son nom
        $chosen_equipage = Equipages::where("nom_equipage", $request -> nom) -> first();
        if($chosen_equipage === null) {
            return back() -> withErrors([
                "error_in_equipage_name" => "Ce groupe n'existe pas !",
            ]);
        }

        // On part de l'equipage
        $already_joined = $chosen_equipage
        // On retrouve tous les utilisateurs qui ont rejoins l'equipage
        -> joined_users() 
        // On cherche si l'utilisateur actuel l'a deja rejoins
        -> where("id_utilisateur", session("id")) 
        // On compare a 1
        -> count() >= 1;

        if($already_joined) {
            return to_route("equipage.show") -> withErrors([
                "error_in_equipage_name" => "Vous avez deja rejoint cet équipage",
            ]);
        }



        // Rejoindre l'équipage
        Rejoint::create([
            "id_equipage" => $chosen_equipage -> id,
            "id_utilisateur" => session("id"),
            "est_chef" => false,
        ]);

        return to_route("equipage.show");
    }


    public function delete(Rejoint $user_join) {
        
        // On part du record user_join
        $id_equipage_chef = $user_join 
        // On retrouve l'equipage
        -> equipage() 
        // On prend le premier equipage qui correspond a ce nom, de toute facon il ya une contraine d'unicité sur le nom
        -> first() 
        // On retrouve tous les utilisateurs qui ont rejoins l'equipage
        -> joined_users() 
        // On cherche le chef dans la liste des utilisateurs qui ont rejoins
        -> where("est_chef", true) 
        // On prend le premier, de toute facon il n y a qu'un chef
        -> first() 
        // On recupere son id d'utilisateur
        -> id_utilisateur;


        if($id_equipage_chef === session("id")) {
            if($user_join -> id_utilisateur === session("id")) {
                return back() -> withErrors([
                    "pas_kick" => "Vous ne pouvez pas vous kick de votre propre équipe, vous devez la supprimer",
                ]);
            }
            
            $user_join -> delete();
            return back();
        }
        
        return abort(403);
    }

    
    public function quit(Rejoint $rejoint) {
        if($rejoint -> est_chef === 1) {
            return back() -> withErrors([
                "pas_quitter" => "Vous ne pouvez pas quitter votre propre équipe, vous devez la supprimer",
            ]);
        }

        $rejoint -> delete();
        return back();        
    }
}
