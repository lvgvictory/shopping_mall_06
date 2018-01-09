<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images()
    {
    	return $this->hasMany(Image::class);
    }

    public function productSizes()
    {
    	return $this->hasMany(ProductSize::class);
    }

    public function billDetails()
    {
    	return $this->hasMany(BillDetail::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function subCategory()
    {
    	return $this->belongsTo(SubCategory::class);
    }

    public function discount()
    {
    	return $this->belongsTo(Discount::class);
    }
}
