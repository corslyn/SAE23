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
            $table -> increments('id');
            $table -> datetime("date");


            $table -> integer('id_lieu_depart') -> unsigned();
            $table -> foreign('id_lieu_depart') -> references('id') -> on('lieus');

            $table -> integer('id_lieu_arrive') -> unsigned();
            $table -> foreign('id_lieu_arrive') -> references('id') -> on('lieus');

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
