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

    protected $dates=[
        // aqui se escriben los nombres de las columnas que quiero manejar en formato carbon
        'fechaprueba',
    ];

    public function zonas(){
        return $this->belongsTo(Zona::class);
    }
}
