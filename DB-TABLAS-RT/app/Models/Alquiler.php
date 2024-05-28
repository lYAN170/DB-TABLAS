<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    protected $fillable = ['monto', 'fecha_inicio', 'fecha_fin', 'departamento_id'];
    protected $table = 'alquileres';
    public function inquilinos()
    {
        return $this->belongsToMany(Inquilino::class, 'inquilino_alquiler', 'alquiler_id', 'inquilino_id');
    }
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}


