<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;

class SingleController extends Controller
{
    public function getIndex($id)
    {
        $product = Product::find($id);
        $countRate = Comment::where('product_id', $id)->count();
        $image = $product->images->all();
        $discount = $product->discount;
        $comment = $product->comments->where('content', '<>', NULL)->all();
        $productSize = $product->productSizes->all();

        return view('pages.single', compact([
            'product',
            'image',
            'discount',
            'comment',
            'productSize',
            'countRate'
        ]));
    }
}
