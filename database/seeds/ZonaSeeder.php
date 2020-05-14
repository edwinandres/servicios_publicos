<?php

use App\Zona;
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
        //DB::table('zonas')->insert([
        Zona::create([
            'nombre' => 'Rural'          
        ]);

        //DB::table('zonas')->insert([
        Zona::create([
            'nombre' => 'Urbana'            
        ]);

        //DB::table('zonas')->insert([
        Zona::create([
            'nombre' => 'Semirural'
        ]);

        //DB::table('zonas')->insert([
        Zona::create([
            'nombre' => 'Semiurbana'
        ]);
    }
}
