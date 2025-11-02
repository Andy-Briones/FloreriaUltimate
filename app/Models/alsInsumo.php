<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsInsumo extends Model
{
    //
    public function inventario()
    {
        return $this->hasMany(alsinvetory::class, 'als_insumos_id');
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
