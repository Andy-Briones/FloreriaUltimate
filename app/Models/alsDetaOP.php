<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsDetaOP extends Model
{
    //
    public function order()
    {
        return $this->belongsTo(alsOrder::class, 'als_order_id');
    }
    public function product()
    {
        return $this->belongsTo(alsProduct::class, 'als_product_id');
    }
}
