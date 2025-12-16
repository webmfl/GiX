<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'sueldo',
        'puesto_id',
    ];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }
}
