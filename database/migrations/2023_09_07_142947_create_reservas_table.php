<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paquete_id');
           
            $table->string('nombre');
            $table->string('telefono');
            $table->string('correo')->nullable();
            $table->string('direccion');
            $table->string('indicaciones');
            $table->string('ci');
            $table->json('fecha')->nullable();
            
            
            $table->enum('estado', ['Pendiente', 'Entregado', 'Cancelado'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
