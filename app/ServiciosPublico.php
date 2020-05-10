<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ServiciosPublico extends Model
{
    //
    protected $fillable=[
        "nombre",
        "descripcion"
    ];

    public function zonas(){
        return $this->belongsTo(Zona::class);
    }
}
