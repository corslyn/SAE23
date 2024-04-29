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
        Schema::create('deplacements', function (Blueprint $table) {
            $table -> id();
            $table -> string("participation_demandee");
            
            $table -> unsignedBigInteger('id_vehicule');
            $table -> foreign('id_vehicule') -> references('id') -> on('vehicules') -> onDelete('cascade') -> onUpdate('cascade');

            $table -> unsignedBigInteger('id_lieux');
            $table -> foreign('id_lieux') -> references('id') -> on('lieux') -> onDelete('cascade') -> onUpdate('cascade');
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deplacements');
    }
};
