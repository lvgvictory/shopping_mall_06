<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function productSizes()
    {
    	return $this->hasMany(ProductSize::class);
    }
}
