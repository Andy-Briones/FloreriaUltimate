<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsSupplier extends Model
{
    //
    protected $fillable = ['name', 'contact_email', 'phone_number', 'address'];
    public function insumo()
    {
        return $this->hasMany(alsInsumo::class, 'als_supplier_id');
    }
}
