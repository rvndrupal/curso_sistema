<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $fillable = ['nombre','tipo_documento','num_documento','direccion','telefono','email'];

    public function proveedor()
    {
        return $this->hasOne(Proveedores::class,'id','id');
    }
}
