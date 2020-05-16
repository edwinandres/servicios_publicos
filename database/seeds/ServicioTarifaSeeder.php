<?php

use Illuminate\Database\Seeder;

class ServicioTarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicio_tarifa')->insert([
            'servicio_id' => 1,
            'tarifa_id' => 1,
        ]);
        DB::table('servicio_tarifa')->insert([
            'servicio_id' => 1,
            'tarifa_id' => 2,
        ]);
        DB::table('servicio_tarifa')->insert([
            'servicio_id' => 2,
            'tarifa_id' => 1,
        ]);
        DB::table('servicio_tarifa')->insert([
            'servicio_id' => 2,
            'tarifa_id' => 3,
        ]);
    }
}
