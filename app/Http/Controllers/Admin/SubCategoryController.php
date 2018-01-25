<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::orderBy('id', 'desc')->paginate(config('custom.elementPage'));

        return view('admin.pages.subcategories.list', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('admin.pages.subcategories.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subCategories = new SubCategory();
        $subCategories->category_id = $request->categoryId;
        $subCategories->name = $request->nameSub;
        $subCategories->save();

        $notification = [
            'message' => trans('message.add_sussuces'),
            'alert-type' => 'success'
        ];

        return redirect()->route('sub-category.index')->with($notification);
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
        if (isset($id)) {
            $editSubCate = SubCategory::find($id);
            $cate = Category::find($editSubCate->category_id);

            return view('admin.pages.subcategories.edit', compact('editSubCate', 'cate'));
        } else {
            App::abort(404);
        }
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
        try {
            $subCategories = SubCategory::find($id);
            $subCategories->name = $request->nameSub;
            $subCategories->update();
            $notification = [
                'message' => trans('message.edit_sussuces'),
                'alert-type' => 'success'
            ];

            return redirect()->route('sub-category.index')->with($notification);
        } catch (Exception $e) {
            App::abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (isset($id)) {
            $deleteSubCate = SubCategory::find($id);
            $deleteSubCate->delete();
            $notification = array(
                'message' => trans('message.delete_sussuces'),
                'alert-type' => 'success'
            );

            return redirect()->route('sub-category.index')->with($notification);
        } else {
            App::abort(404);
        }


    }
}
