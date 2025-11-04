<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsInsumo extends Model
{
    //

    protected $fillable = ['nombre', 'descripcion', 'tipo', 'stock', 'unidad', 'estado','costo_unitario','als_supplier_id', 'als_category_id'];
    public function inventario()
    {
        return $this->belongsToMany(Alsinvetory::class, 'als_inventory_insumos', 'als_insumos_id', 'alsinvetories_id')
                    ->withPivot('cantidad_usada', 'costo_total')
                    ->withTimestamps();
    }

    public function deta()
    {
        return $this->hasMany(alsInventoryInsumo::class, 'als_insumos_id');
    }

    //Relacion con categoria y proveedor
    public function category()
    {
        return $this->belongsTo(alsCategory::class, 'als_category_id');
    }
    public function supplier()
    {
        return $this->belongsTo(alsSupplier::class, 'als_supplier_id');
    }
}
