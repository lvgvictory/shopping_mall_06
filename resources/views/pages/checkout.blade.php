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
                            <a class="delete-product rowid_cart" idCart="{{ $key }}"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </td>
                    <td class="invert-image"><a href="single.html"><img src="site/images/{{ $item->options->img }}" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus qualyti_product" idCart="{{$key}}">&nbsp;</div>
                                <div class="entry value soluong"><span>{{ $item->qty }}</span></div>
                                <div class="entry value-plus active qualyti_product" idCart="{{$key}}">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">{{ $item->name }}</td>
                    <td class="invert item_price">{{ number_format($item->price) }}{{ trans('messages.$') }}</td>
                    <td class="invert item_total_price">{{ number_format($item->price) * $item->qty }}{{ trans('messages.$') }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="checkout-left">
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>{{ trans('messages.Shopping_basket')}}</h4>
                <ul>
                    <li class="total_price">{{ trans('messages.Total_price')}} <i>:</i> <span>{{ $total }}</span></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <hr>
        <div class="row">
            <div align="center">ĐẠT HÀNG</div>
            <div class="col-sm-8 col-sm-push-2">
                <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        {{-- @foreach($errors->all() as $err)
                            {{ $err }}
                        @endforeach --}}
                        {{ $errors->first() }}
                    </div>
                    @endif
                    @if (Session::has('thongbao'))
                    <div class="row alert alert-success"> {{Session::get('thongbao')}} </div>
                    @endif
                    <div class="form-group">
                    <label for="exampleInputEmail1">Họ Tên: </label>
                    @if (isset(Auth()->user()->name))
                    <input name="id" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth()->user()->id }}">
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ tên" value="{{ Auth()->user()->name }}">
                    @else
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ tên" value="{{ old('name') }}">
                    @endif
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email: </label>
                    @if (isset(Auth()->user()->email))
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ Auth()->user()->email }}">
                    @else
                    <input id="check_mail" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
                    <div class="result_email"></div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ: </label>
                    @if (isset(Auth()->user()->address))
                    <input name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Địa chỉ" value="{{ Auth()->user()->address }}">
                    @else
                    <input name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Địa chỉ" value="{{ old('address') }}">
                    @endif
                  </div><div class="form-group">
                    <label for="exampleInputEmail1">SĐT: </label>
                    @if (isset(Auth()->user()->phone))
                    <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Số điện thoại" value="{{ Auth()->user()->phone }}">
                    @else
                    <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Số điện thoại" value="{{ old('phone') }}">
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea">Ghi chú: </label>
                    <textarea name="message" class="form-control" id="exampleTextarea" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Đặt Hàng</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //check out -->
@endsection
@section('script')
{{ Html::script('js/checkout.js') }}
@endsection
