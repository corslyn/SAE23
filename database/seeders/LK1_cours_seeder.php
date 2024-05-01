<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LK1_cours_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("emploidutemps") -> insert([
            "sous_groupe" => "LK1",
            "l_debut" => "9h30",
            "l_fin" => "16h30",
            "m_debut" => "8h",
            "m_fin" => "12h30",
            "me_debut" => "8h",
            "me_fin" => "18h",
            "j_debut" => "9h30",
            "j_fin" => "15h",
            "v_debut" => "13h30",
            "v_fin" => "18h00",
            "s_debut" => null,
            "s_fin" => null
        ]);
    }
}
