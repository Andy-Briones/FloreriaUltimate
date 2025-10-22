<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsSupplier extends Model
{
    //
    public function buys()
    {
        return $this->hasMany(alsBuy::class, 'als_supplier_id');
    }
    public function products()
    {
        return $this->hasMany(alsProduct::class, 'als_supplier_id');
    }
}
