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
        Schema::create('als_insumos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('tipo');
            $table->integer('stock');
            $table->string('unidad');
            $table->string('estado')->default('activo');
            $table->decimal('costo_unitario', 10,2);
            $table->foreignId('als_supplier_id')->constrained('als_suppliers')->onDelete('cascade');
            $table->foreignId('als_category_id')->constrained('als_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('als_insumos');
    }
};
