<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class galeria extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idgaleria';
    protected $fillable = ['idgaleria', 'foto', 'descripcion', 'idservicio'];
}
