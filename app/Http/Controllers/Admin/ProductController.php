<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Size;
use App\Models\Discount;
use App\Models\Image;
use App\Models\ProductSize;
use App\Models\Category;
use DB;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(config('custom.elementPage'));

        return view('admin.pages.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        $sizes = Size::all();
        $discount = Discount::all();
        $categories = Category::all();

        return view('admin.pages.products.add', compact([
            'subcategories',
            'sizes',
            'discount',
            'categories'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        DB::beginTransaction();
        try {
            if (!$request->category) {
                return redirect()->back()->with('error', 'Bạn chưa chọn danh mục cho sản phẩm');
            }

            $products = new Product;
            $products->subcategory_id = $request->subcategory_id;
            $products->name = $request->name;
            $products->slug = str_slug($request->name, '-');
            $products->price = $request->price;
            $products->description = $request->description;
            $products->discount_id = $request->discount_id;
            $products->status = 1;
            $products->total = $request->total;
            $products->save();

            foreach ($request->size_id as $sizeId) {
                $product_size = new ProductSize;
                $product_size->size_id = $sizeId;
                $product_size->product_id = $products->id;
                $product_size->save();
            }

            DB::commit();
            foreach ($request->photos as $photo) {
                $filename =$photo->getClientOriginalName();
                $photo->storeAs('public/photos', $filename);
                $file = new Image;
                $file->product_id = $products->id;
                $file->image = $filename;
                $file->save();
            }

            $notification = [
                'message' => trans('message.add_sussuces'),
                'alert-type' => 'success',
            ];

            return redirect()->route('product.index')->with($notification);
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCategory(Request $request)
    {
        if ($request->ajax()) {
            $cate_id = $request->cate;
            $subcategories = SubCategory::where('category_id', $cate_id)->get();

            $html = view('admin.pages.products.ajax_subcategory', compact('subcategories'))->render();
            return response($html);
        }
    }
}
