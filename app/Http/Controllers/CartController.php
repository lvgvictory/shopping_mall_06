<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use App\Helpers\helper;

class CartController extends Controller
{
    public function showCart()
    {
        $content = Cart::content();
        //$total = helper::customTotal();
        $total = Cart::subtotal(3);

        return view('pages.checkout', compact([
            'content',
            'total'
        ]));
    }

    public function delCart(Request $request)
    {
        $idCart = $request->idCart;

        if (Cart::get($idCart)) {
            Cart::remove($idCart);

            return response()->json('1');
        }

        return response()->json('0');
    }

    public function updateCart(Request $request)
    {
        $quantity = $request->quantity;
        $rowID = $request->rowID;

         Cart::update($rowID, $quantity);
         $data = Cart::get($rowID);

        return response()->json([
            'data' => $data
        ]);
    }
}
