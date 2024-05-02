<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDeplacementRequest;
use App\Models\Deplacement;
use App\Models\Lieu;
use App\Models\Rejoint;
use Illuminate\Http\Request;

class DeplacementController extends Controller
{
    public function show() {
        // Chercher si l'utilisateur est chef d'une team
        $user_own_team = Rejoint::where("id_utilisateur", session("id")) 
              -> where("est_chef", true) -> first();

        if($user_own_team) {
            $lieux = Lieu::where("id_utilisateur", session("id")) -> get();
        }

        // Recuperer tous les déplacements prévus pour cet utilisateur
        $tous_les_deplacements_prévus = Rejoint::select(
            "nom_equipage", "date", "duree",
            "lieux_départ.code_postal as code_postal_départ", 
            "lieux_départ.ville as ville_départ", 
            "lieux_départ.adresse as adresse_départ",
            
            "lieux_arrivé.code_postal as code_postal_arrivé", 
            "lieux_arrivé.ville as ville_arrivé", 
            "lieux_arrivé.adresse as adresse_arrivé",
        ) -> where("rejoints.id_utilisateur", "=", session("id"))
        -> join('equipages', 'equipages.id', '=', 'rejoints.id_equipage')
        -> join('deplacements', 'deplacements.id_equipage', '=', 'equipages.id')
    
        -> join('lieus as lieux_départ', 'deplacements.id_lieu_depart', '=', 'lieux_départ.id')
        -> join('lieus as lieux_arrivé', 'deplacements.id_lieu_arrive', '=', 'lieux_arrivé.id')
        -> get();


        return view("app.deplacement", [
            "tous_les_deplacements_prévus" => $tous_les_deplacements_prévus,
            "user_own_team" => $user_own_team,
            "lieux" => $lieux ?? null,
        ]);
    }


    public function create(CreateDeplacementRequest $request) {
        // On cherche l'equipage qui appartient a l'utilisateur actuel
        $id_equipage = Rejoint::where("id_utilisateur", session("id")) 
        -> where("est_chef", true) -> first() -> id_equipage;

        Deplacement::create([
            "id_lieu_arrive" => $request["deplacement"],
            "id_lieu_depart" => $request["deplacement_depart"],
            "date" => $request["date"],
            "id_equipage" => $id_equipage,
            "duree" => $request["duree"],
        ]);

        return back();
    }
}
