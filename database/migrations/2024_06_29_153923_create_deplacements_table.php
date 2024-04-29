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
            $table -> datetime("date");


            $table -> unsignedBigInteger('id_lieu_depart');
            $table -> foreign('id_lieu_depart') -> references('id') -> on('lieus') -> onDelete('cascade');

            $table -> unsignedBigInteger('id_lieu_arrive');
            $table -> foreign('id_lieu_arrive') -> references('id') -> on('lieus') -> onDelete('cascade');

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
