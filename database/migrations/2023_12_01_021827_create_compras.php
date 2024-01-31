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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_hora');
            $table->float('iva');
            $table->double('costo_total');
            $table->string('comentario')->nullable();
            $table->string('direccion')->nullable();
            $table->tinyInteger('estado');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mesa_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('mesa_id')->references('id')->on('mesas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
