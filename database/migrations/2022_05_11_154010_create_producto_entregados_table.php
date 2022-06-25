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
        Schema::create('producto_entregados', function (Blueprint $table) {
            $table->id();
            $table->string('tipoE');
            $table->string('inventarioE');//numero de inventario
            $table->string('serieE');//numero de serie
            $table->string('responsable');//responsable
            $table->string('estado');
            $table->text('observacion')->nullable();
            $table->integer('n')->nullable();
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
        Schema::dropIfExists('producto_entregados');
    }
};
