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
        Schema::create('als_arreglo_insumos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->foreignId('als_insumos_id')->constrained('als_insumos')->onDelete('cascade');
            $table->foreignId('als_arreglo_florals_id')->constrained('als_arreglo_florals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('als_arreglo_insumos');
    }
};
