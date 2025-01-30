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
        Schema::create('mascota', function (Blueprint $table) {
            $table->id('id_Mascota');
            $table->string('nombre_Mascota');
            $table->string('foto_Mascota');
            $table->date('fecha_Nacimiento');
            $table->string('genero');
            $table->string('raza_Mascota');
            $table->foreignId('id_Sangre_Mascota');
            $table->foreignId('id_Usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascota');
    }
};
