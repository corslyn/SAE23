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
        Schema::create('vehicules', function (Blueprint $table) {
            $table -> id();
            $table -> string('type');
            $table -> tinyInteger('nb_places');
            $table -> string('immatriculation');
            
            $table -> bool('carte_grise');
            $table -> bool('controle_technique');
            $table -> bool('assurance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
