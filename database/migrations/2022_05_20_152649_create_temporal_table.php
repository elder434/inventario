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
        Schema::create('temporals', function (Blueprint $table) {
            $table->id('id');
            $table->string('tipoT');
            $table->string('inventarioT');//numero de inventario
            $table->string('serieT');//numero de serie
            $table->string('responsableT');//responsable
            $table->string('estadoT');
            $table->text('observacionT')->nullable();
            $table->integer('nT')->nullable();
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
        Schema::dropIfExists('temporal');
    }
};
