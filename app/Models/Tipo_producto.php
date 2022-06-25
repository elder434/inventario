<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_producto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productos(){
        

        return $this->hasMany('App\Models\Producto');
    }
}
