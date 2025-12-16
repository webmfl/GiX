<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'dni',
        'fecha_ingreso',
        'direccion',
        'telefono',
        'localidad',
        'matricula',
        'seccion_id',
        'valor_cuota',
        'bonificacion',
        'padre',
        'madre',
        'telefono_padre',
        'telefono_madre',
        'dni_padre',
        'dni_madre',
        'hermanos'
    ];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'seccion_id');
    }
}
