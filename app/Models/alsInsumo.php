<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsInsumo extends Model
{
    //
    public function ArregloInsumo()
    {
        return $this->hasMany(alsArregloInsumo::class, 'als_insumos_id');
    }
}
