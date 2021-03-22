<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class contacto extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idcontacto';
    protected $fillable = ['idcontacto', 'nombre', 'app', 'apm', 'correoc', 'mensaje'];
}
