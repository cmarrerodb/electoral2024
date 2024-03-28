<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vtrabajador extends Model
{
    protected $table = 'vtrabajadores';
    
    protected $fillable = [
        'cedula',
        'nombre',
        'estado',
        'municipio',
        'circuito',
        'parroquia',
        'gabinete',
        'ente',
        'nombre_dependencia',
        'telefono',
        'voto',
        'movilizacion',
        'observaciones',
        'hora_voto'
    ];
}
