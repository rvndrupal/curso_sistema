<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedores'; //con esto le decimos que es a la tabla proveedores
    protected $fillable = [
        'id', 'contacto', 'telefono_contacto'
    ];

    public $timestamps = false; //ya que no existe los campos los apagamos

    public function personas()
    {
        return $this->belongsTo(Personas::class,'id','id');
        //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
}
