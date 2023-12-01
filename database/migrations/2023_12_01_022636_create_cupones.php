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
        Schema::create('cupones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('numero');
            $table->integer('porcentaje');
            $table->integer('cantidad');
            $table->date('fecha_inicio'); 
            $table->date('fecha_fin');
            $table->string('imagen_1');
            $table->unsignedBigInteger('categoria_id'); 
            $table->unsignedBigInteger('producto_id'); 
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupones');
    }
};
