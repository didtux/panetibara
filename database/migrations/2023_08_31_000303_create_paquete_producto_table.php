<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaqueteProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('paquete_producto', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('paquete_id');
        $table->unsignedBigInteger('producto_id');
        $table->timestamps();

        $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete('cascade');
        $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquete_producto');
    }
}
