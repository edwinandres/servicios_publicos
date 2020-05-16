<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioTarifaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_tarifa', function (Blueprint $table) {
            $table->id();

            $table->integer('servicio_id')->unsigned();
            $table->integer('tarifa_id')->unsigned();

            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->foreign('tarifa_id')->references('id')->on('tarifas');

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
        Schema::dropIfExists('servicio_tarifa');
    }
}
