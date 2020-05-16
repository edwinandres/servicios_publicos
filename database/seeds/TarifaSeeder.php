<?php

use Illuminate\Database\Seeder;

class TarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Tarifa::create([
            'nombre' => 'Empresarial',
            'descripcion' => 'Tarifa para empresas',
        ]);

        \App\Tarifa::create([
            'nombre' => 'Subsidiada',
            'descripcion' => 'Tarifa para estratos bajos',
        ]);

        \App\Tarifa::create([
            'nombre' => 'Standard',
            'descripcion' => 'Tarifa común',
        ]);
    }
}
