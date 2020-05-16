<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(ZonaSeeder::class);
        $this->call(ServiciosSeeder::class);
        $this->call(TipoFacturaSeeder::class);
        $this->call(ServiciosTipofactSeeder::class);
        $this->call(TarifaSeeder::class);
        $this->call(ServicioTarifaSeeder::class);

    }
}
