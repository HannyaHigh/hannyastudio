<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class users extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'idusuaio';
    protected $fillable = ['idusuaio', 'nombre', 'app', 'apm', 'email', 'contraseña', 'sexo', 'celular', 'ciudad', 'calle', 'nocalle', 'cp', 'idtipoususario', 'img', 'activo'];
}
