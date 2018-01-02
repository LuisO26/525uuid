<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peticion extends Model
{
    protected $table = 'usuario';
    protected $fillable = [
        'nombre','idUnico','idOrigen'
    ];
}
