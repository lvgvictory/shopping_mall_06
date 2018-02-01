<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\User;

class BillController extends Controller
{
    public function getListBill()
    {
        $bills = Bill::paginate(config('custom.defaultPage'));

        return view('admin.Bills.list_bill', compact('bills'));
    }

    public function getListBillDetail($id)
    {
        settype($id, 'int');
        $bill = Bill::find($id);
        $bill_detail = BillDetail::where('bill_id', $id)->get();
        
        return view('admin.Bills.detail_bill', compact([
            'bill_detail',
            'bill'
        ]));
    }

    //Ajax lọc theo status bảng Bill
    public function ajaxFillterBill(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->status;

            if ($status == 5) {
                $bills = Bill::all();
                $html = view('admin.Bills.ajax_fillter_bill', compact('bills'))->render();

                return response($html);
            }

            // $bills = Bill::where('active', $status)->paginate(config('custom.defaultPage'));
            $bills = Bill::where('active', $status)->paginate(1);
            $html = view('admin.Bills.ajax_fillter_bill', compact('bills'))->render();

            return response($html);
        }
    }

    //Ajax Cập nhật status bảng Bill
    public function ajaxUpdateStatusBill(Request $request)
    {
        if ($request->ajax()) {
            $statuss = $request->statuss;
            $idBill = $request->idBill;
            $bill = Bill::find($idBill);

            if ($statuss == 0) { // Trạng thái Đang Chờ
                $bill->active = 0;
                $bill->save();

                return response()->json('Đang Chờ');
            } elseif ($statuss == 1) { // Trạng thái Xác Nhận
                $bill->active = 1;
                $bill->save();

                return response()->json('Xác Nhận');
            } elseif ($statuss == 2) { // Trạng thái Hoàn Thành
                $bill->active = 2;
                $bill->save();

                return response()->json('Hoàn Thành');
            } else { //trạng thái hủy bỏ
                $bill->active = 3;
                $bill->save();

                return response()->json('Hủy Bỏ');
            }
        } else {
            $html = abort(404)->render();

            return response($html);
        }
    }

    public function getDelBill($id)
    {
        settype($id, 'int');
        $bill = Bill::find($id);

        $bill->delete();

        return redirect()->back();
    }
}
