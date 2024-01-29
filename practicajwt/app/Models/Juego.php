<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    protected $filleable = [
        'nombre',
        'descripcion',
        'precio',
        'desarrollador',
    ];
}
