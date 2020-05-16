<?php

use Illuminate\Database\Seeder;
use App\Servicio;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //DB::table('servicios_publicos')->insert([
        Servicio::create([
            'idzona' => 1,
            'nombre' => 'Energia',
            'descripcion' => 'Energia electrica kw/h' ,
            'tipocliente' => 'Persona'

        ]);

        //DB::table('servicios_publicos')->insert([
        Servicio::create([
            'idzona' => 2,
            'nombre' => 'Acueducto',
            'descripcion' => 'Agua potable para consumo',
            'tipocliente' => 'Empresa'
        ]);

        //DB::table('servicios_publicos')->insert([
        Servicio::create([
            'idzona' => 3,
            'nombre' => 'Alcantarillado',
            'descripcion' => 'Manejo de aguas sucias',
            'tipocliente' => 'Persona'
        ]);

        //DB::table('servicios_publicos')->insert([
        Servicio::create([
            'idzona' => 4,
            'nombre' => 'Gas',
            'descripcion' => 'Red de gas hasta su hogar',
            'tipocliente' => 'Empresa'
        ]);

        //DB::table('servicios_publicos')->insert([
        Servicio::create([
            'idzona' => 1,
            'nombre' => 'Telefonia fija',
            'descripcion' => 'Telefonia ilimitada',
            'tipocliente' => 'Persona'
        ]);
    }
}
