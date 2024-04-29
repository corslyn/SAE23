<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Emploidutemps;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function app() {
        // On test si la table à déja été remplie
        $emploi_du_temps = Emploidutemps::where("sous_groupe", session("sous_groupe")) -> first();


    }
}
