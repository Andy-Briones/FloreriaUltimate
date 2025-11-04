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
        Schema::create('als_inventory_insumos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_usada'); // 👈 cantidad de insumo usada
            $table->decimal('costo_total', 10, 2)->default(0); // 👈 opcional: para guardar costo parcial
            $table->foreignId('als_insumos_id')->constrained('als_insumos')->onDelete('cascade');
            $table->foreignId('alsinvetories_id')->constrained('alsinvetories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('als_inventory_insumos');
    }
};
