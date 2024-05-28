<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['direccion', 'renta', 'propietario_id'];
    protected $table = 'departamentos';

    public function alquileres()
    {
        return $this->hasMany(Alquiler::class);
    }

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }
}
