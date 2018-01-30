@extends('layouts.master')
@section('content')
<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3> Đơn Hàng Của Tôi </h3>
    </div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
    <div class="container">
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th> Xóa </th>
                        <th> Ngày Đặt </th>
                        <th> Mô Tả </th>
                        <th> Giá </th>
                        <th> status </th>
                        <th> Chi Tiết </th>
                    </tr>
                </thead>
                @foreach ($bills as $bill)
                <tr class="rem1">
                    <td class="invert-closeb">
                        @if ($bill->active == 0)
                        <div class="rem">
                            <a class="delete-product" href="{{ route('delbill', $bill->id) }}" onclick="return confirm('Bạn có chắc là muốn xóa?')"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
                        </div>
                        @endif
                    </td>
                    <td class="invert">
                        {{ $bill->created_at }}
                    </td>
                    <td class="invert">
                        {{ $bill->message }}
                    </td>
                    <td class="invert">
                        {{ $bill->total_price }}
                    </td>
                    <td class="invert">
                        @if ( $bill->active == 0)
                        {{ 'Đang Chờ' }}
                        @elseif ($bill->active == 1)
                        {{ 'Xác Nhận' }}
                        @elseif ($bill->active == 2)
                        {{ 'Hoàn Thành' }}
                        @else
                        {{ 'Hủy Bỏ' }}
                        @endif
                    </td>
                    <td class="invert">
                        <div class="btn-group">
                            <a class="btn btn-info" href="{{ route('billdetailcustomer', $bill->id) }}"><i class="fa fa-info"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<!-- //check out -->
@endsection
@section('script')
{{ Html::script('js/checkout.js') }}
@endsection
