<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsSupplier extends Model
{
    //
    public function insumo()
    {
        return $this->hasMany(alsInsumo::class, 'als_supplier_id');
    }
}
