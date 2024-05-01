<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LK2_cours_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("emploidutemps") -> insert([
            "sous_groupe" => "LK2",
            "l_debut" => "8h30",
            "l_fin" => "12h30",
            "m_debut" => "8h",
            "m_fin" => "18",
            "me_debut" => "9h30",
            "me_fin" => "16h30",
            "j_debut" => "13h30",
            "j_fin" => "15h",
            "v_debut" => "8h",
            "v_fin" => "18h",
            "s_debut" => null,
            "s_fin" => null
        ]);
    }
}
