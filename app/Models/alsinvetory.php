<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsinvetory extends Model
{
    //
    public function deta()
    {
        return $this->hasMany(alsInventoryInsumo::class, 'alsinventories_id');
    }
    public function products()
    {
        return $this->hasMany(alsProduct::class, 'alsinventories_id');
    }
    public function insumo()
    {
        return $this->belongsTo(alsInsumo::class,'als_insumos_id');
    }
}
