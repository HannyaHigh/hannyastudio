<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pruebas extends Model
{
    use HasFactory;
    protected $primaryKey = 'idprueba';
    protected $fillable = ['idprueba', 'nombre', 'user', 'contraseña', 'tipo', 'activo'];
}
