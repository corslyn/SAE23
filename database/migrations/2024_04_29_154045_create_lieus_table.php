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
        Schema::create('lieus', function (Blueprint $table) {
            $table -> id();
            $table -> string("adresse");
            $table -> string("code_postal");
            $table -> string("ville");
            $table -> boolean("est_domicile");

            $table -> unsignedBigInteger('id_vehicule') -> nullable();
            $table -> foreign('id_vehicule') -> references('id') -> on('vehicules');

            $table -> unsignedBigInteger('id_utilisateur');
            $table -> foreign('id_utilisateur') -> references('id') -> on('utilisateurs') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lieus');
    }
};
