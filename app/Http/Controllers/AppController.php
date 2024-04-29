<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function app() {
        $cours = Cours::where("id_formation", session("id_formation"))
            -> where("sous_groupe", session("sous_groupe"))
            -> get();

        return view("app.app", ["cours" => $cours]);
    }
}
