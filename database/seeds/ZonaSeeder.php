<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('zonas')->insert([
            'nombre' => 'Rural'          
        ]);

        DB::table('zonas')->insert([
            'nombre' => 'Urbana'            
        ]);

        DB::table('zonas')->insert([
            'nombre' => 'Semirural'
        ]);

        DB::table('zonas')->insert([
            'nombre' => 'Semiurbana'
        ]);
    }
}
