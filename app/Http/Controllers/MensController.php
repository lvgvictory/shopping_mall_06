<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Slide;

class MensController extends Controller
{
    public function getIndex($id)
    {
    	$c = Category::all();
    	$subCategory = SubCategory::find($id);
    	$cate = $subCategory->category;
    	$page = Product::where('subcategory_id', $subCategory->id)->paginate(config('custom.defaultPage'));
    	$products = $subCategory->products->all();
    	$categories = $cate->subCategories;
    	$slide = Slide::where('active', config('custom.defaultTwo'))->get();

    	return view('pages.mens', compact([
    		'subCategory',
    		'cate',
    		'products',
    		'categories',
    		'slide',
    		'page'
    	]));
    }
}
