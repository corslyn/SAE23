<?php

namespace App\Http\Controllers;

use App\Models\Rejoint;
use Illuminate\Http\Request;

class DeplacementController extends Controller
{
    public function show() {
        $user_own_team = Rejoint::where("id_utilisateur", session("id")) 
              -> where("est_chef", true);

        return view("app.deplacement", [
            "user_own_team" => $user_own_team,
        ]);
    }
}
