<?php

namespace App\Http\Controllers;

use App\Models\Vehicules;
use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use App\Http\Requests\AjoutVehiculeRequest;

class VehiculeController extends Controller
{
    public function show() {
        return view("app.vehicule", [
            "vehicule" => Vehicules::where("id", session("id_vehicule")) -> first(),
            "has_vehicle" => session() -> has("id_vehicule"),
        ]);
    }

    public function create(AjoutVehiculeRequest $request) {

        $vehicule = Vehicules::create([
            "immatriculation" => $request["immatriculation"],
            "nombre_places" => $request["nombre_places"],
        ]);

        // Ajouter le véhicule a l'utilisateur
        Utilisateurs::find(session("id")) -> update([
            "id_vehicule" => $vehicule -> id
        ]);

        // Ajout de l'id du véhicule a la session
        session(["id_vehicule" => $vehicule -> id]);

        // Retour à la page vehicule
        return to_route("vehicule.show") -> with("success", "Vous possédez désormais un véhicule");

    }


    public function delete(Vehicules $vehicule) {
        // Si la voiture que l'utilisateur tente de supprimer n'est pas la sienne
        if($vehicule -> id !== session("id_vehicule")) {
            return abort(403);
        }
        
        Utilisateurs::where("id", session("id")) -> update([
            "id_vehicule" => null,
        ]);

        // Enlever la clé voiture_id
        session() -> forget("id_vehicule");

        // Supprimer le véhicule
        $vehicule -> delete();

        return back() -> with("deleted_vehicule", "deleted");
    }
}
