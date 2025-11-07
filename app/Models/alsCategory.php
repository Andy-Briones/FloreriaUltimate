<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsCategory extends Model
{
    //
    protected $fillable = ['name', 'description'];
    public function insumo()
    {
        return $this->hasMany(alsinvetory::class, 'als_category_id');
    }
}
