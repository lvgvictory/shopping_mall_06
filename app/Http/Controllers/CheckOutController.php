<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\Comment;
use Session;
use Cart;
use DB;
use Mail;
use Auth;

class CheckOutController extends Controller
{
    var $email = "";

    public function postCheckout(Request $request)
    {
        $this->validate($request, 
            [
                'name' => 'required|min:2',
                'email' => 'required|email',
                'address' => 'required|min:8',
                'phone' => 'required|numeric|min:10'
            ],
            [
                'name.required' => 'Vui lòng nhập tên của bạn',
                'name.min' => 'Tên của bạn cần phải nhiều hơn hai ký tự',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email định dạng không đúng',
                'address.required' => 'Vui lòng nhập địa chỉ của bạn',
                'address.min' => 'Địa chỉ cần phải nhiều hơn 8 ký tự',
                'phone.required' => 'Vui lòng nhập số điện thoại của bạn',
                'phone.numeric' => 'Vui lòng nhập số điện thoại là số',
                'phone.min' => 'Số điện thoại phải có độ dài > 9'
                
            ]
        );

        DB::beginTransaction();

        try {
            $user = "";
            if (Auth::check()) {
                $user = User::find(Auth::user()->id);

                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->address = $request->address;

                $user->save();
            } else {
                $user = new User();

                $user->name = $request->name;
                $user->email = $request->email;
                $user->image = config('custom.defaultAvatar');
                $user->password = "";
                $user->role = config('custom.defaultTwo');
                $user->phone = $request->phone;
                $user->address = $request->address;

                $user->save();
            }

            $bill = new Bill();

            $bill->user_id = $user->id;
            $bill->active = config('custom.defaultDiscount');
            $bill->full_name = $request->name;
            $bill->address = $request->address;
            $bill->payment = 'COD';
            $bill->message = $request->message;
            $bill->total_price = Cart::subtotal(3);

            $bill->save();

            $cartData = Cart::content();

            foreach ($cartData as $key => $data) {
                $billDetail = new BillDetail();

                $billDetail->bill_id = $bill->id;
                $billDetail->product_id = $data->id;
                $billDetail->quantity = $data->qty;
                $billDetail->unit_price = $data->price;

                $billDetail->save();
            }

            DB::commit();

            $this->email = $request->email;

            $data =  [
                'name' => $request->name,
                'email' => $request->email,
                'Cart' => Cart::content(),
                'total' => Cart::subtotal(3),
                'count' => Cart::count(),
                'mobile' => $request->phone,
                'address' => $request->address
            ];

            Mail::send('mails.order', $data, function ($msg) {
                $msg->from('legiang15091995@gmail.com', 'Giang Le');
                $msg->to($this->email, 'Ahihi')->subject('Cảm ơn bạn đã đặt hàng của cửa hàng chúng tôi');
            });

        Cart::destroy();

            return redirect()->back()->with('thongbao', 'Đặt Hàng Thành Công Bạn Vui Lòng Check Mail');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('loi', 'Đặt Hàng Không Thành Công');
        }
    }

    public function getCheckEmail(Request $request)
    {
        if ($request->ajax()) {
            $email = $request->check_mail;
            $count = User::where('email', $email)->count();
            return response()->json($count);
        }
    }

    public function getRatePoint(Request $request)
    {      
        DB::beginTransaction();
        try {
                $rate = $request->rate_point;
                $id_user = $request->id_user;
                $id_product = $request->id_product;

                $rated = Comment::updateOrCreate(
                    ['user_id' => $id_user, 'product_id' => $id_product],
                    ['rate' => $rate]
                );

                $count = Comment::where('product_id', $id_product)->count();
                $sum_rate = Comment::where('product_id', $id_product)->sum('rate');
                $rating = $sum_rate/$count;

                $product = Product::find($id_product);

                $product->rate_point = $rating;

                $product->save();

                DB::commit();

                return response()->json([
                    'rating' => $rating,
                    'count' => $count
                ]);

        } catch (Exception $e) {
            DB::rollBack();
            $html = abort(404)->render();
            return response($html);
        }
    }
}
