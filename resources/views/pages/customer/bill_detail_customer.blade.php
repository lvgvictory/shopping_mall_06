@extends('layouts.master')
@section('content')
<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3> Chi Tiết Đơn Hàng </h3>
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
                        <th> ID </th>
                        <th><i class="icon_profile"></i> Tên Sản Phẩm </th>
                        <th><i class="icon_cogs"></i> Số Lượng </th>
                        <th><i class="glyphicon glyphicon-eur"></i> Giá </th>
                    </tr>
                </thead>
                @foreach ($bill_detail as $bd)
                <tr>
                    @php
                        $product = $bd->product;
                    @endphp
                    <td>{{ $bd->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $bd->quantity }}</td>
                    <td>{{ $bd->unit_price * $bd->quantity }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2">
                <a class="btn btn-warning" href="{{ route('billcustomer', Auth::user()->id)}}"><i class="glyphicon glyphicon-chevron-left"></i> Quay Lại </a>
            </div>
        </div>
    </div>
</div>
<!-- //check out -->
@endsection
@section('script')
{{ Html::script('js/checkout.js') }}
@endsection
