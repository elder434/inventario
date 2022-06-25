<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tipo_producto(){
        return $this->belongsTo('App\Models\Tipo_producto');
    }

    public function producto_entregado(){
        return $this->hasOne('App\Models\Producto_entregado');
    }
}
