<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    protected $fillable =[
        'codigo','nombre','precio_venta','stock','descripcion','condicion','category_id'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }
}
