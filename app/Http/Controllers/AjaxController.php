<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AjaxController extends Controller
{
    public function searchProduct(Request $request)
    {
        if ($request->ajax()) {
            $keyword = str_slug($request->keyword);
            $products = Product::where('slug', 'like', "%$keyword%")
                                ->orwhere('name', 'like', "%$keyword%", 'status', config('custom.defaultOne'))
                                ->where('status', 1)
                                ->orderBy('id', 'desc')
                                ->get();
            return response()->json($products);
        }
    }
}
