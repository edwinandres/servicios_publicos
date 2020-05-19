<?php

use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Proveedor::create([
            'nombre' => 'Claro',
            'descripcion' => 'Claro Movil',
        ]);
        \App\Proveedor::create([
            'nombre' => 'EPM',
            'descripcion' => 'Empresas Publicas de Medellin',
        ]);

    }
}
