<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Comment;
use  DB;


class HomePageController extends Controller
{
    public function getIndex()
    {
        $products = Product::where('status', config('custom.defaultOne'))->orderBy('id', 'desc')->paginate(config('custom.defaultPage'));
        $categories = Category::all();
        $listProduct = Product::getAllProductByDiscount();
        $rateProducts = Product::where('status', config('custom.defaultOne'))->orderBy('rate_point', 'desc')->paginate(config('custom.defaultPage'));

        return view('pages.home', compact([
            'products',
            'categories',
            'listProduct',
            'rateProducts'
        ]));
    }
}
