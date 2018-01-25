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
        $categories = Category::orderBy('id', 'desc')->paginate(config('custom.elementPage'));
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
            $category->avatar = $filename;
            $category->name = $request->name;
            $category->save();

            $notification = [
                'message' => trans('message.add_sussuces'),
                'alert-type' => 'success',
            ];

            return redirect()->route('category.index')->with($notification);
        } catch (Exception $e) {
            return $e->get_message();
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
        if (isset($id)) {
            $editCate = Category::find($id);
            return view('admin.pages.categories.edit', compact('editCate'));
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
    public function update(EditCategoryRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);

            if ($request->hasFile('image')) {
                $filename = helper::upload($request->file('image'), config('custom.defaultPath'));
                $category->avatar = $filename;
            }

            $category->name = $request->name;
            $category->update();
            $notification = [
                'message' => trans('message.edit_sussuces'),
                'alert-type' => 'success'
            ];

            return redirect()->route('category.index')->with($notification);
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
            $deleteCate = Category::findOrFail($id);
            $deleteCate->delete();
            $notification = [
            'message' => trans('message.delete_sussuces'),
            'alert-type' => 'success'
            ];

            return redirect()->route('category.index')->with($notification);
        } else {
            App::abort(404);
        }

    }
}
