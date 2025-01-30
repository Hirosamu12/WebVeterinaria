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
        Schema::create('donation', function (Blueprint $table) {
            $table->id('id_Donacion');
            $table->timestamp('ultima_Modificacion');
            $table->date('fecha_Donacion');
            $table->float('cantidad_Donacion');
            $table->string('lugar_Donacion', 100);
            $table->integer('estado_Donacion');
            $table->foreignId('id_Mascota_Receptor');
            $table->foreignId('id_Mascota_Donante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation');
    }
};
