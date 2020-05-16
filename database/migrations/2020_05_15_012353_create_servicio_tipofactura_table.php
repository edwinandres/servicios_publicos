<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioTipofacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_tipofactura', function (Blueprint $table) {
            $table->id();

            $table->integer('servicio_id')->unsigned();
            $table->integer('tipofactura_id')->unsigned();

            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->foreign('tipofactura_id')->references('id')->on('tipofacturas');

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
        Schema::dropIfExists('servicio_tipofactura');
    }
}
