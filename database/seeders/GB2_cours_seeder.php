<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GB2_cours_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("emploidutemps") -> insert([
            "sous_groupe" => "GB2",
            "l_debut" => "8h30",
            "l_fin" => "16h30",
            "m_debut" => "8h",
            "m_fin" => "16h30",
            "me_debut" => "8h",
            "me_fin" => "18h",
            "j_debut" => "9h30",
            "j_fin" => "15h",
            "v_debut" => "11h",
            "v_fin" => "12h30",
            "s_debut" => "",
            "s_fin" => ""
        ]);
    }
}
