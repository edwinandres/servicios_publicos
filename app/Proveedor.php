<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $fillable=[
        "nombre",
        "descripcion"
    ];
    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
