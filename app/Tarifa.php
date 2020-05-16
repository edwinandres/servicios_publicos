<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    //

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class);
    }
}
