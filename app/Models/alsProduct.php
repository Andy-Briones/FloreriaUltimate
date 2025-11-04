<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsProduct extends Model
{
    //
    protected $fillable =['name', 'description', 'price', 'stock', 'image_path', 'costo_produccion','estado','alsinvetories_id'];
    // public function category()
    // {
    //     return $this->belongsTo(alsCategory::class, 'als_category_id');
    // }
    // public function supplier()
    // {
    //     return $this->belongsTo(alsSupplier::class, 'als_supplier_id');
    // }
    public function inventario()
    {
        return $this->belongsTo(alsinvetory::class,'alsinvetories_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(alsDetaOP::class, 'als_product_id');
    }
}
