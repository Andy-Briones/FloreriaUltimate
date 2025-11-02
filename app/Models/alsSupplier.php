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
    public function insumo()
    {
        return $this->hasMany(alsInsumo::class, 'als_supplier_id');
    }
}
