<?php

use Illuminate\Database\Seeder;
use App\Tipofactura;

class TipoFacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tipofactura::create([
            'nombre' => 'Fisica',
            'descripcion' => 'Factura impresa' ,

        ]);

        Tipofactura::create([
            'nombre' => 'Electronica',
            'descripcion' => 'Factura via web' ,

        ]);
    }
}
