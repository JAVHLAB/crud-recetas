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
        Schema::create('ingrediente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del ingrediente
            $table->string('unidad')->nullable(); // Unidad de medida (opcional)
            $table->decimal('cantidad', 8, 2)->nullable(); // Cantidad del ingrediente (opcional)
            $table->foreignId('receta_id')->constrained('receta')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingrediente');
    }
};
