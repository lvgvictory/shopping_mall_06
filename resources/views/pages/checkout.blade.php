@extends('layouts.master')
@section('content')
<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3>{{ trans('messages.Check_Out') }}</h3>
    </div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
    <div class="container">
        <h3>{{ trans('messages.My_Shopping_Bag') }}</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>{{ trans('messages.Remove') }}</th>
                        <th>{{ trans('messages.Image') }}</th>
                        <th>{{ trans('messages.Quality') }}</th>
                        <th>{{ trans('messages.Product_Name') }}</th>
                        <th>{{ trans('messages.Price') }}</th>
                        <th>{{ trans('messages.Total') }}</th>
                    </tr>
                </thead>
                @foreach ($content as $key => $item)
                <tr class="rem1">
                    <td class="invert-closeb">
                        <div class="rem">
                            <a  idCart="{{ $key }}" class="delete-product"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </td>
                    <td class="invert-image"><a href="single.html"><img src="site/images/{{ $item->options->img }}" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>{{ $item->qty }}</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">{{ $item->name }}</td>
                    <td class="invert item_price">{{ number_format($item->price, 0, ",", ".") }}{{ trans('messages.$') }}</td>
                    <td class="invert item_total_price">{{ number_format($item->price, 0, ",", ".") * $item->qty }}{{ trans('messages.$') }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="checkout-left">
            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="{{ route('home-page')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>{{ trans('messages.Back_To_Shopping') }}</a>
            </div>
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>{{ trans('messages.Shopping_basket')}}</h4>
                <ul>
                    <li class="total_price">{{ trans('messages.Total_price')}} <i>:</i> <span>{{ $total }}</span></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //check out -->
@endsection
@section('script')
{{ Html::script('js/checkout.js') }}
@endsection
