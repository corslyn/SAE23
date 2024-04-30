<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEquipageRequest;
use App\Http\Requests\JoinEquipageRequest;
use App\Models\Equipages;
use App\Models\Rejoint;

class EquipageController extends Controller
{
    public function show() {
        $joined_equipe = Rejoint::where("id_utilisateur", session("id"));
        $leader_of_equipe = $joined_equipe -> where("est_chef", true);

        return view("app.equipage", [
            "joined_equipe" => $joined_equipe -> get(),
            "leader_of_equipe" => $leader_of_equipe -> first(),
        ]);
    }


    public function create(CreateEquipageRequest $request) {
        // On créé l'équipage
        $equipage = Equipages::create([
            "nom_equipage" => $request -> nom,
        ]);

        // On le fait rejoindre l'équipage en tant que chef
        Rejoint::create([
            "id_equipage" => $equipage -> id,
            "id_utilisateur" => session("id"),
            "est_chef" => true,
        ]);
    }


    public function join(JoinEquipageRequest $request) {
        
        // Recuperer l'id l'equipage choisi a partir de son nom
        $chosen_equipage = Equipages::where("nom_equipage", $request -> nom) -> first();
        if($chosen_equipage === null) {
            return back() -> withErrors([
                "error_in_equipage_name" => "Ce groupe n'existe pas !",
            ]);
        }

        // Rejoindre l'équipage
        Rejoint::create([
            "id_equipage" => $chosen_equipage -> id,
            "id_utilisateur" => session("id"),
            "est_chef" => false,
        ]);

        return back();
    }


    public function delete(Rejoint $user_join) {
        // Si l'utilisateur essaye de supprimer un lieu qui ne lui appartient pas
        if($user_join -> id_utilisateur !== session("id"))
            return abort(403);

        // On supprime le lieu de la table
        $user_join -> delete();
        return back();
    }
}
