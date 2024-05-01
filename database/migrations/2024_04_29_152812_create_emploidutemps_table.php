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
        Schema::create('emploidutemps', function (Blueprint $table) {
            $table -> string("sous_groupe");

            $table -> string("l_debut") -> nullable();
            $table -> string("l_fin") -> nullable();

            $table -> string("m_debut") -> nullable();
            $table -> string("m_fin") -> nullable();
            
            $table -> string("me_debut") -> nullable();
            $table -> string("me_fin") -> nullable();
            
            $table -> string("j_debut") -> nullable();
            $table -> string("j_fin") -> nullable();

            $table -> string("v_debut") -> nullable();
            $table -> string("v_fin") -> nullable();

            $table -> string("s_debut") -> nullable();
            $table -> string("s_fin") -> nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploidutemps');
    }
};