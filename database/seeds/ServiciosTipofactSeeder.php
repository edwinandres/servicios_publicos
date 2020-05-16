<?php

use Illuminate\Database\Seeder;

class ServiciosTipofactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('servicio_tipofactura')->insert([
            'servicio_id' => 2,
            'tipofactura_id' => 1,

        ]);

        DB::table('servicio_tipofactura')->insert([
            'servicio_id' => 1,
            'tipofactura_id' => 1,

        ]);
        DB::table('servicio_tipofactura')->insert([
            'servicio_id' => 1,
            'tipofactura_id' => 2,

        ]);
    }
}
