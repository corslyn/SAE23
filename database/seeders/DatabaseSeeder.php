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
        DB::table('formations') -> insert([
            "id" => 1,
            "nom" => "RT1",
        ]);

        DB::table('formations') -> insert([
            "id" => 2,
            "nom" => "MMI",
        ]);

        DB::table('formations') -> insert([
            "id" => 3,
            "nom" => "GACO",
        ]);

        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
