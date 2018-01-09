<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function bill()
    {
    	return $this->belongsTo(Bill::class);
    }
}
