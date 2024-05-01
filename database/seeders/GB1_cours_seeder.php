<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GB1_cours_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("emploidutemps") -> insert([
            "sous_groupe" => "GB1",
            "l_debut" => "8h30",
            "l_fin" => "18h",
            "m_debut" => "8h",
            "m_fin" => "18h",
            "me_debut" => "8h",
            "me_fin" => "9h30",
            "j_debut" => "11h",
            "j_fin" => "12h30",
            "v_debut" => "8h",
            "v_fin" => "18h",
            "s_debut" => null,
            "s_fin" => null
        ]);
    }
}
