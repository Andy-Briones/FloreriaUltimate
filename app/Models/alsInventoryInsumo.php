<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsInventoryInsumo extends Model
{
    //
    public function Insumo()
    {
       return $this->belongsTo(alsInsumo::class, 'als_insumos_id');
    }
    public function Inventario()
    {
        return $this->belongsTo(alsinvetory::class, 'alsinventories_id');
    }
}
