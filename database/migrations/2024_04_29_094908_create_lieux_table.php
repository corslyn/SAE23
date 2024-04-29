<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lieux', function (Blueprint $table) {
            $table -> id();
            $table -> string("adresse");
            $table -> string("arret_bus");
            $table -> string("moyen_transport");
            $table -> string("duree");
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lieuxes');
    }
};
