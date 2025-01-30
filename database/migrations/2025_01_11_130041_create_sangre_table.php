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
        Schema::create('sangre', function (Blueprint $table) {
            $table->integer('id_Sangre')->unsigned()->primary();
            $table->string('tipo_Sangre', 10);
            $table->string('factorRH', 10);  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sangre');
    }
};
