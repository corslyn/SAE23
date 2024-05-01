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
            "nom" => "A23",
            "email" => "a2f@localhost",
            // This password is: a
            "mot_de_passe" => "e9b35379a4a2155324153569bea58a99de746e9e1603da9721bdd06271bebb2512358b3a65dd5631f5251796f444cc7047d1aacd49d65e2928343c6b8aa79052",
            "secret" => "TSQILWPNPQWPGR62MOJGM5T24QOMF2G6",
            "formation" => "RT1",
            "sous_groupe" => "LK1",
            "id_vehicule" => null,
            "is_admin" => false,
            "created_at" => "2024-04-30 19:07:48",
            "updated_at" => "2024-04-30 22:58:45",
        ]);

        DB::table("utilisateurs") -> insert([
            "nom" => "A",
            "email" => "a@a.a",
            
            // This password is a
            "mot_de_passe" => "e9b35379a4a2155324153569bea58a99de746e9e1603da9721bdd06271bebb2512358b3a65dd5631f5251796f444cc7047d1aacd49d65e2928343c6b8aa79052",
            "secret" => null,
            "formation" => "RT1",
            "sous_groupe" => "GB1",
            "id_vehicule" => null,
            "is_admin" => false,
            "created_at" => "2024-04-30 19:07:48",
            "updated_at" => "2024-04-30 22:58:45",
        ]);

        DB::table("utilisateurs") -> insert([
            "nom" => "Admin",
            "email" => "admin@localhost",

            // This password is: admin
            "mot_de_passe" => "857b47cfadee1b62e6057c23d3cb880e7d5c5c19edcd95c71d3a0b4a0164c21445d3afa8acecc86099d54c9696db0e5a953634b44b1652fbdf5838bff97f3d4b",
            "secret" => null,
            "formation" => "RT1",
            "sous_groupe" => "LK2",
            "id_vehicule" => null,
            "is_admin" => true,
            "created_at" => "2024-04-30 19:07:48",
            "updated_at" => "2024-04-30 22:58:45",
        ]);
    }
}
