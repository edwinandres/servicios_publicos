<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipofactura extends Model
{
    //

    public function servicios(){
        return $this->belongsToMany(Servicio::class);
    }
}
