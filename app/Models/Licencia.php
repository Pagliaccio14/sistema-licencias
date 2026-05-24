<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    protected $fillable = [
    'nombre',
    'apellido_paterno',
    'apellido_materno',
    'edad',
    'telefono',
    'direccion',
    'tipo_licencia',
    'fecha_expedicion',
    'fecha_vencimiento',
    'foto'
];
}
