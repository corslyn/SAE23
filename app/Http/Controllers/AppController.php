<?php

namespace App\Http\Controllers;

use App\Http\Requests\AjoutVehiculeRequest;
use App\Models\Cours;
use App\Models\Emploidutemps;
use App\Models\Utilisateurs;
use App\Models\Vehicules;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function edt() {
        // On test si la table à déja été remplie
        $emploidutemps = Emploidutemps::where("sous_groupe", session("sous_groupe")) -> first();
        
        // On ne trouve aucun emploi du temps ? Alors les tables n'ont pas encore été remplie
        // on va utiliser le fichier JSON plus un parser pour les remplir
        if($emploidutemps === null) {
            return abort(404, "REMPLIT LA TABLE EMPLOI DU TEMPS SALE FOU !");
        }

        return view("app.emploidutemps", [
            "emploidutemps" => $emploidutemps,
        ]);
    }

    public function search(Request $request) {
        $request -> 
    }
}
