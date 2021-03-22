<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class servicio extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idservicio';
    protected $fillable = [
        'idservicio', 'servicio', 'descripcion', 'costo', 'reparacion',
        'conversion', 'impresion', 'enmarcados', 'img'
    ];
}
