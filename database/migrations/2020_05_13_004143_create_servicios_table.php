<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('idzona');
            $table->foreign('idzona')->references('id')->on('zonas');

            $table->string('felectronica')->nullable();
            $table->string('ffisica')->nullable();
            $table->integer('tipofactura')->nullable();

            $table->string('nombre');
            $table->string('descripcion');
            $table->string('tipocliente')->nullable();

            $table->string('fechaprueba')->nullable();
            $table->date('fechaenvio')->nullable();
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
        Schema::dropIfExists('servicios');
    }
}
