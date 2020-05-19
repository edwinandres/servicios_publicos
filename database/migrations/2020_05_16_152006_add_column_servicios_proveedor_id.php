<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnServiciosProveedorId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('servicios', function (Blueprint $table) {
            $table->unsignedInteger('proveedor_id')->nullable();
            $table->foreign('proveedor_id')->references('id')->on('proveedors');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropColumn('proveedor_id');

        });
    }
}
