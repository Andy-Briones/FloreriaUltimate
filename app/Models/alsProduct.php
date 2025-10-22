<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsProduct extends Model
{
    //
    public function category()
    {
        return $this->belongsTo(alsCategory::class, 'als_category_id');
    }
    public function supplier()
    {
        return $this->belongsTo(alsSupplier::class, 'als_supplier_id');
    }
    public function orderDetails()
    {
        return $this->hasMany(alsDetaOP::class, 'als_product_id');
    }
    public function buyDetails()
    {
        return $this->hasMany(alsDetaB::class, 'als_product_id');
    }
}
