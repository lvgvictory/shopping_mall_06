<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\User;

class BillCustomerController extends Controller
{
    public function getIndex($id)
    {
        settype($id, 'int');
        $bills = Bill::where('user_id', $id)->get();

        return view('pages.customer.bill_customer', compact('bills'));
    }

    public function getBillDetail($id)
    {
        settype($id, 'int');
        $bill_detail = BillDetail::where('bill_id', $id)->get();

        return view('pages.customer.bill_detail_customer', compact('bill_detail'));
    }

    public function getDeleteBill($id)
    {
        settype($id, 'int');
        $bill = Bill::find($id);

        $bill->delete();

        return redirect()->back();
    }
}
