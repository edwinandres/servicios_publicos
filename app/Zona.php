<?php

namespace App;
use App\ServiciosPublico;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    //
    public function servicios_publicos(){
        return $this->hasMany(ServiciosPublico::class);
    }
}
