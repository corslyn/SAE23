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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table -> id();
            $table -> string('nom');
            $table -> string('email') -> unique();

            $table -> string('mot_de_passe');
            $table -> string('secret') -> nullable();

            
            $table -> string('formation');
            $table -> string('sous_groupe');

            $table -> unsignedBigInteger('id_vehicule') -> nullable();
            $table -> foreign('id_vehicule') -> references('id') -> on('vehicules');

            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
