<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Comment;
use Cart;
use App\Helpers\helper;

class HomePageController extends Controller
{
    public function getIndex()
    {
        $products = Product::where('status', config('custom.defaultOne'))
                            ->orderBy('id', 'desc')
                            ->paginate(config('custom.defaultPage'));
        $categories = Category::all();
        $listProduct = Product::getAllProductByDiscount()->paginate(config('custom.defaultPage'));
        $rateProducts = Product::where('status', config('custom.defaultOne'))
                                ->orderBy('rate_point', 'desc')
                                ->paginate(config('custom.defaultPage'));
                                
        return view('pages.home', compact([
            'products',
            'categories',
            'listProduct',
            'rateProducts'
        ]));
    }

    public function addCart(Request $request)
    {
        $id = $request->item_id;
        $item_price = explode(' ', $request->item_price);
        $product_buy = Product::find($id);
        $image = $product_buy->images->first();

        Cart::add([
            'id' => $id,
            'name' => $product_buy->name,
            'qty' => 1,
            'price' => intval($item_price[0]),
            'options' => ['img' => $image->image]
        ]);

        //$total = helper::customTotal();
        $total = Cart::subtotal(3);
        $count_cart = Cart::count();

        return response()->json([
            'total' => $total,
            'count_cart' => $count_cart
        ]);

    }

    public function getCart()
    {
        //$total = helper::customTotal();
        $total = Cart::subtotal(3);
        $count_cart = Cart::count();

        return response()->json([
            'total' => $total,
            'count_cart' => $count_cart
        ]);
    }
}
