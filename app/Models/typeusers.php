<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeusers extends Model
{
    use HasFactory;
    protected $primaryKey = 'idtipoususario';
    protected $fillable = ['idtipoususario', 'tipo'];
}
