<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsInventoryInsumo extends Model
{
    //
    protected $table = 'als_inventory_insumos';
    protected $fillable = [
        'als_insumos_id',
        'alsinvetories_id',
        'cantidad_usada', // si tu tabla tiene este campo
        'costo_total',
    ];
    public function Insumo()
    {
       return $this->belongsTo(alsInsumo::class, 'als_insumos_id');
    }
    public function Inventario()
    {
        return $this->belongsTo(alsinvetory::class, 'alsinvetories_id');
    }
}
