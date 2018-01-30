<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Discount;
use App\Models\Comment;
use DB;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'slug',
        'status',
        'total',
        'subcategory_id',
        'discount_id',
    ];

    protected $primaryKey = 'id';

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
    	return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function discount()
    {
    	return $this->belongsTo(Discount::class);
    }

    public function scopeGetAllProductByDiscount($query)
    {
        $listProduct = $query->join('discounts', 'discount_id', '=', 'discounts.id')
                            ->select('products.*', 'discounts.discount')
                            ->where('discounts.discount', '>', config('custom.defaultDiscount'))
                            ->orderBy('discounts.discount', 'desc');
        return $listProduct;
    }
}
