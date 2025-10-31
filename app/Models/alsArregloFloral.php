<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsArregloFloral extends Model
{
    //
    public function ArregloInsumo()
    {
        return $this->hasMany(alsArregloInsumo::class, 'als_arreglo_florals_id');
    }
}
