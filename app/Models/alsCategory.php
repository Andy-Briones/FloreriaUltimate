<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsCategory extends Model
{
    //
    public function products()
    {
        return $this->hasMany(alsProduct::class, 'als_category_id');
    }
}
