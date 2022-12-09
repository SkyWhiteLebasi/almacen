<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
    public function semana(){
        return $this->belongsTo('App\Models\Semana');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
