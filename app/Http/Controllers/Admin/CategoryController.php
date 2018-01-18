<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Helpers\helper;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.pages.categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryRequest $request)
    {
        try {
            $category = new Category();
            $filename = helper::upload($request->file('image'), config('custom.defaultPath'));
            $category->imgs = $filename;
            $category->name = $request->name;
            $category->save();

            $notification = [
                'message' => 'you add successful!',
                'alert-type' => 'success'
            ];

            return redirect()->route('category.index')->with($notification);
        } catch (Exception $e) {
            echo $e->get_message();
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
        $editCate = Category::find($id);

        return view('admin.pages.categories.edit', compact('editCate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        try {
            $category = Category::find($id);

            if ($request->hasFile('image')) {
                $filename = helper::upload($request->file('image'), config('custom.defaultPath'));
                $category->imgs = $filename;
            }

            $category->name = $request->name;
            $category->update();
            $notification = array(
                'message' => 'you update successful!',
                'alert-type' => 'success'
            );

            return redirect()->route('category.index')->with($notification);
        } catch (Exception $e) {
            echo $e->get_message();
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
        $deleteCate = Category::find($id);
        $deleteCate->delete();
        $notification = array(
            'message' => 'you delete successful!',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')->with($notification);
    }
}
