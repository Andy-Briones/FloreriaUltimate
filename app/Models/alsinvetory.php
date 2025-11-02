<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsinvetory extends Model
{
    //
    public function products()
    {
        return $this->hasMany(alsProduct::class, 'alsinventories_table');
    }
    public function insumo()
    {
        return $this->belongsTo(alsInsumo::class,'als_insumos_id');
    }
}
