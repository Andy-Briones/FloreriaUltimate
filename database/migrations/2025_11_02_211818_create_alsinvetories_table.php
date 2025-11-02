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
        Schema::create('alsinvetories', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_usada');
            $table->decimal('costo_total', 10, 2);
            $table->string('descripcion');
            $table->foreignId('als_insumos_id')->constrained('als_insumos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alsinvetories');
    }
};
