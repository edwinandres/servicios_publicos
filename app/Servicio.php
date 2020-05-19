<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
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

    public function tipofacturas()
    {
        return $this->belongsToMany(Tipofactura::class);
    }

    public function tarifas()
    {
        return $this->belongsToMany(Tarifa::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class,'proveedor_id');
    }
}
