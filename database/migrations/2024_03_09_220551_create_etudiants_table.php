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
        Schema::create('etudiants', function (Blueprint $table) {
            $table -> id();
            $table -> string('prenom');
            $table -> string('nom');
            $table -> string('name');
            $table -> string('domiciliation');
            
            $table -> unsignedBigInteger('id_formation');
            $table -> foreign('id_formation') -> references('id') -> on('formations') -> onDelete('cascade') -> onUpdate('cascade');
            
            $table -> string('groupe');
            $table -> string('sous_groupe');

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
