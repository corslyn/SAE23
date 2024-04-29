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
        Schema::create('rejoint_equipages', function (Blueprint $table) {
            $table -> unsignedBigInteger('id_etudiant');
            $table -> foreign('id_etudiant') -> references('id') -> on('etudiants') -> onDelete('cascade') -> onUpdate('cascade');
            
            $table -> unsignedBigInteger('id_equipage');
            $table -> foreign('id_equipage') -> references('id') -> on('equipages') -> onDelete('cascade') -> onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rejoint_equipages');
    }
};
