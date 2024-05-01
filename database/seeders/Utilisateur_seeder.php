<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Utilisateur_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("utilisateurs") -> insert([
            "nom" => "Enzo",
            "email" => "enzo@manzi.fr",
            // Password is a
            "mot_de_passe" => "e9b35379a4a2155324153569bea58a99de746e9e1603da9721bdd06271bebb2512358b3a65dd5631f5251796f444cc7047d1aacd49d65e2928343c6b8aa79052",
            "secret" => "TSQILWPNPQWPGR62MOJGM5T24QOMF2G6",
            "formation" => "RT1",
            "sous_groupe" => "LK1",
            "id_vehicule" => null,
            "created_at" => "2024-04-30 19:07:48",
            "updated_at" => "2024-04-30 22:58:45",
        ]);
    }
}
