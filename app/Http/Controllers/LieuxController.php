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
        $have_domicile_principal = Lieu::where("est_domicile", true) -> where("id_utilisateur", session("id")) -> get() -> count();
        $have_travail_lieu = Lieu::where("est_travail", true) -> where("id_utilisateur", session("id")) -> get() -> count();


        return view("app.lieux", [
            "lieux" => $lieux,
            "already_have_domicile" => $have_domicile_principal,
            "already_have_travail" => $have_travail_lieu,

        ]);
    }   

    public function create(AjoutLieuxRequest $request) {
        $is_domicile_principale = $request -> has("checkbox");
        $is_lieu_travail = $request -> has("checkbox_travail");

        if(
            // Si on n'essaye d'ajouter ni un domicile principal ni un lieu de travail
            $is_domicile_principale === false && $is_lieu_travail === false
            // Et qu'on n'a pas de véhicule
            && session() -> has("id_vehicule") === false
        ) {
            return back() -> withErrors([
                "error" => "Vous ne pouvez pas ajouter de lieux autre que votre domicile principal, car vous n'avez pas de voiture", 
            ]);
        } 


        Lieu::create([
            "adresse" => $request["adresse"],
            "code_postal" => $request["postal"],
            "ville" => $request["ville"],
            "est_domicile" => $is_domicile_principale,
            "est_travail" => $is_lieu_travail,
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
