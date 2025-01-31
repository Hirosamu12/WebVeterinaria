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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_Usuario');
            $table->string('nombre_Usuario', 50);
            $table->string('apellido_Usuario', 50);
            $table->string('password');
            $table->integer('cedula');
            $table->string('email', 50);
            $table->string('telefono', 50);
            $table->string('direccion', 50);
            $table->tinyInteger('id_Rol');
            $table->string('estado', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
