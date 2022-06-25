<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id');
            $table->string('file')->nullable();
            $table->unsignedBigInteger('tipo_producto_id');//item
            $table->string('docente')->nullable();
            $table->string('serie');//numero de serie
            $table->string('inventario');//inventario
            $table->string('orden')->nullable();//orden de compra
            $table->string('factura');
            $table->timestamps();
            $table->foreign('tipo_producto_id')->references('id')->on('tipo_productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};




