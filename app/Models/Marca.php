<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    //Relacion M - 1 con Categoria
    public function marca(){
        return $this->belongsTo(Marca::class);
    }
}
