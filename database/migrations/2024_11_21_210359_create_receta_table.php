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
        Schema::create('receta', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre de la receta
            $table->text('descripcion'); // Descripción de la receta
            $table->text('ingredientes'); // Lista de ingredientes (en formato de texto)
            $table->text('instrucciones'); // Instrucciones de preparación
            $table->string('imagen'); // Ruta de la imagen de la receta (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta');
    }
};
