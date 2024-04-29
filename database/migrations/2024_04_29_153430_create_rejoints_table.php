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
        Schema::create('rejoints', function (Blueprint $table) {
            $table -> id();
            $table -> boolean("est_chef");

            $table -> unsignedBigInteger('id_equipage');
            $table -> foreign('id_equipage') -> references('id') -> on('equipages') -> onDelete('cascade');

            $table -> unsignedBigInteger('id_utilisateur');
            $table -> foreign('id_utilisateur') -> references('id') -> on('utilisateurs') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rejoints');
    }
};
