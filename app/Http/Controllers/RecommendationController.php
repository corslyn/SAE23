<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function show() {

        $linked = [
            "ville_d" => null,
            "adresse_d" => null,
            "code_postal_d" => null,
            "ville_tr" => null,
            "adresse_tr" => null,
            "code_postal_tr" => null,
        ];


        $domicile_lieu = Lieu::select("*") -> where("id_utilisateur", session("id")) -> where("est_domicile", true ) -> first();
        $travail_lieu = Lieu::select("*") -> where("id_utilisateur", session("id")) -> where("est_travail", true ) -> first();

      

        if($domicile_lieu !== null) {
            $linked["ville_d"] = $domicile_lieu -> ville;
            $linked["adresse_d"] = $domicile_lieu -> adresse;
            $linked["code_postal_d"] = $domicile_lieu -> code_postal;
        }
        if($travail_lieu !== null) {
            $linked["ville_tr"] = $travail_lieu -> ville;
            $linked["adresse_tr"] = $travail_lieu -> adresse;
            $linked["code_postal_tr"] = $travail_lieu -> code_postal;
        }

        $lieu = Lieu::select("adresse", "code_postal", "ville", "nom_equipage", "date", "duree") -> whereIn("adresse", [$linked["adresse_d"], $linked["adresse_tr"]]) 
            -> whereIn("ville", [$linked["ville_d"], $linked["ville_tr"]])
            -> whereIn("code_postal", [$linked["code_postal_d"], $linked["code_postal_tr"] ])
            -> where("id_utilisateur", "!=", session("id"))
            -> join('deplacements', function($join) {
                $join -> on('lieus.id', '=', 'deplacements.id_lieu_depart')
                      -> orOn('lieus.id', '=', 'deplacements.id_lieu_arrive');
            })  
            -> join('equipages', 'deplacements.id_equipage', '=', 'equipages.id')
            -> get();
        
       
        return view("app.recommendation", [
            "related_places" => $lieu,
        ]);
    }
}
