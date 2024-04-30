<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LK1_cours_seeder::class,
            LK2_cours_seeder::class,
            GB1_cours_seeder::class,
            GB2_cours_seeder::class,
        ]);
    }
}
