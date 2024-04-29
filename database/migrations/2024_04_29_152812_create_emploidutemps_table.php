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

            $table -> string("l_debut");
            $table -> string("l_fin");

            $table -> string("m_debut");
            $table -> string("m_fin");
            
            $table -> string("me_debut");
            $table -> string("me_fin");
            
            $table -> string("j_debut");
            $table -> string("j_fin");

            $table -> string("v_debut");
            $table -> string("v_fin");

            $table -> string("s_debut");
            $table -> string("s_fin");
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
