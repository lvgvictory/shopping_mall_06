<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	
    public function billDetails()
    {
    	return $this->hasMany(BillDetail::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
