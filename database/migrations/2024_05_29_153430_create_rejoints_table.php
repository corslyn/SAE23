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
            $table -> increments('id');
            $table -> boolean("est_chef");

            $table -> integer('id_equipage') -> unsigned();
            $table -> foreign('id_equipage') -> references('id') -> on('equipages');

            $table -> integer('id_utilisateur') -> unsigned();
            $table -> foreign('id_utilisateur') -> references('id') -> on('utilisateurs');
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
