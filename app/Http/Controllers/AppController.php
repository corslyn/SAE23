<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cours;
use App\Models\Equipages;
use App\Models\Vehicules;
use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use App\Models\Emploidutemps;
use App\Http\Requests\AjoutVehiculeRequest;

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
        $depart = $request -> input("depart");
        $arrive = $request -> input("arrive");
        $date = $request -> input("date");


        // On recupère tous les voyages disponibles
        $tous_les_voyages = Equipages::select(
            "nom_equipage", "date", "duree",
            "lieux_départ.code_postal as code_postal_départ", 
            "lieux_départ.ville as ville_départ", 
            "lieux_départ.adresse as adresse_départ",
            
            "lieux_arrivé.code_postal as code_postal_arrivé", 
            "lieux_arrivé.ville as ville_arrivé", 
            "lieux_arrivé.adresse as adresse_arrivé",
        )
        -> join('deplacements', 'deplacements.id_equipage', '=', 'equipages.id')
        -> join('lieus as lieux_départ', 'deplacements.id_lieu_depart', '=', 'lieux_départ.id')
        -> join('lieus as lieux_arrivé', 'deplacements.id_lieu_arrive', '=', 'lieux_arrivé.id');

        if($depart !== null) {
            $depart = "%" . $depart . "%";
            // les ET sont prioritaire sur les OU, il faut donc passer par un trick
            // étrange pour réussir a faire une requete du type (x ou x ou x) ET (y ou y ou y)
            $tous_les_voyages -> where(function ($query) use ($depart) {
                $query -> where("lieux_départ.code_postal", "like", $depart) -> 
                    orWhere("lieux_départ.ville", "like", $depart) -> 
                    orWhere("lieux_départ.adresse", "like", $depart);
            });
        }
        if($arrive !== null) {
            $arrive = "%" . $arrive . "%";
            // les ET sont prioritaire sur les OU, il faut donc passer par un trick
            // étrange pour réussir a faire une requete du type (x ou x ou x) ET (y ou y ou y)
            $tous_les_voyages -> where(function ($query) use ($arrive) {
                $query -> where("lieux_arrivé.code_postal", "like", $arrive) -> 
                    orWhere("lieux_arrivé.ville", "like", $arrive) -> 
                    orWhere("lieux_arrivé.adresse", "like", $arrive);
            });
        }

        
        
        if($date !== null) {
            // On ne veut pas que la date fournie par le user match exactement la date qu'on recupère dans la (a la seconde près). 
            // On ne peut pas juste faire un -> where("date", $date) car c'est trop precis, ca fausse les résultat 
            // Ici on abuse en laissant une marge "d'erreur" d'1 semaine, mais on peut évidemment changer ceci très facilement.
            
            // On parse la date a l'aide de Carbon
            $date = Carbon::parse($date);
            
            // On save l'heure
            $heure = $date -> format('H:i:s');

            // Date - 1 semaine
            $date_debut = $date -> subWeek() -> toDateString();

            // La date a été changé par carbon, elle a donc reculé d'une semaine
            // on doit donc avancé de deux semaines pour faire Date + 1 semaine
            $date_fin = $date -> addWeek() -> addWeek() -> toDateString();

            $tous_les_voyages -> where('date', ">=", $date_debut) -> where("date", "<=", $date_fin);
        }

        return view("index", [
            "tous_les_voyages" => $tous_les_voyages -> get(),
        ]);

    }
}
