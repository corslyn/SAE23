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
        Schema::create('equipages', function (Blueprint $table) {
            $table -> id();

            $table -> unsignedBigInteger('id_deplacement');
            $table -> foreign('id_deplacement') -> references('id') -> on('deplacements') -> onDelete('cascade') -> onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipages');
    }
};
