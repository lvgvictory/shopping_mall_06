<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SingleController extends Controller
{
    public function getIndex($id)
    {
        $product = Product::find($id);
        $image = $product->images->all();
        $discount = $product->discount;
        $comment = $product->comments->all();
        $productSize = $product->productSizes->all();

        return view('pages.single', compact([
            'product',
            'image',
            'discount',
            'comment',
            'productSize'
        ]));
    }
}
