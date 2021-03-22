<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class cliente extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idcliente';
    protected $fillable = [
        'idcliente', 'nombrec', 'apellidopa', 'apellidoma', 'sexo', 'telefono', 'correo',
        'contraseña', 'ciudad', 'calle', 'nocalle', 'CP', 'img'
    ];
}
