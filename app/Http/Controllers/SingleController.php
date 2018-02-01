<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\User;
use App\Models\Rate;
use DB;

class SingleController extends Controller
{
    public function getIndex($id)
    {
        $product = Product::find($id);
        $countRate = Rate::where('product_id', $id)->count();
        $image = $product->images->all();
        $discount = $product->discount;
        $comment = Comment::where('product_id', $id)->where('content', '<>', NULL)->orderBy('id', 'desc')->paginate(3);
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

    public function postComment(Request $request)
    {
        DB::beginTransaction();
        try{
            $id_user = $request->id_user;
            $message = $request->content_comment;
            $id_product = $request->id_product;

            $user = User::find($id_user);

            $comment = new Comment();

            $comment->content = $message;
            $comment->product_id = $id_product;
            $comment->user_id = $id_user;

            $comment->save();

            DB::commit();

            $content = $comment->content;
            $name = $user->name;
            $image = $user->image;
            $html = view('pages.customer.comment', compact([
                'content',
                'name',
                'image'
            ]))->render();

            return response($html);

        } catch (Exception $e) {
            DB::rollBack();
            $html = abort(404)->render();
            return response($html);
        }
    }
}
