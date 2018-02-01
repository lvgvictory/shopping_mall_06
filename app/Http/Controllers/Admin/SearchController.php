<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\SubCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function getSearchProduct(Request $request)
    {
        $product = Product::where('name', 'like', '%' . $request->key . '%')->orWhere('price', $request->key)->orWhere('slug', 'like', '%' . $request->key . '%')->get();

        return view('admin.pages.products.search', compact('product'));
    }

    public function getSearchSubCategory(Request $request)
    {
        $subCate = SubCategory::where('name', 'like', '%' . $request->key . '%')->orWhere('slug', 'like', '%' . $request->key . '%')->get();

        return view('admin.pages.subcategories.search', compact('subCate'));
    }
}
