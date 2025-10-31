<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsArregloInsumo extends Model
{
    //
    public function insumo()
    {
        return $this->belongsTo(alsInsumo::class, 'als_insumos_id');
    }
    public function floral()
    {
        return $this->belongsTo(alsArregloFloral::class, 'als_arreglo_florals_id');
    }
}
