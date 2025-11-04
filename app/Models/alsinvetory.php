<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsinvetory extends Model
{
    //
    protected $fillable =['cantidad_usada', 'costo_total','descripcion'];
    public function deta()
    {
        return $this->hasMany(alsInventoryInsumo::class, 'alsinvetories_id');
    }
    public function products()
    {
        return $this->hasMany(alsProduct::class, 'alsinvetories_id');
    }
    // public function insumo()
    // {
    //     return $this->belongsTo(alsInsumo::class,'als_insumos_id');
    // }
}
