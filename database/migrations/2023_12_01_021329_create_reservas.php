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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_hora');
            $table->integer('cantidad_personas');
            $table->string('comentario')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mesa_id');
            // $table->unsignedBigInteger('tipo_reserva_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('mesa_id')->references('id')->on('mesas');
            // $table->foreign('tipo_reserva_id')->references('id')->on('tipo_reservas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
