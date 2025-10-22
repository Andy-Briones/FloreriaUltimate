<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsDetaB extends Model
{
    //
    public function buy()
    {
        return $this->belongsTo(alsBuy::class, 'als_buy_id');
    }
    public function product()
    {
        return $this->belongsTo(alsProduct::class, 'als_product_id');
    }
}
