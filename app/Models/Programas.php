<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
   protected $fillable = [
        'nombrePrograma',
        'tipoPrograma',
        'categoria',
        'nombre'
    ];
}
