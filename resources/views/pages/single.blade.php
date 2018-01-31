@extends('layouts.master')
@section('content')
<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3>{{ trans('messages.Single') }}</h3>
    </div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
    <div class="container">
        <div class="col-md-6 single-right-left animated wow slideInUp animated slideInUp1" data-wow-delay=".5s" style="">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <!-- FlexSlider -->
                    <!-- //FlexSlider-->
                    <ul class="slides">
                        @foreach ($image as $img)
                        <li data-thumb="site/images/{{ $img->image }}">
                            <div class="thumb-image"> <img src="site/images/{{ $img->image }}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated slideInRight1" data-wow-delay=".5s" style="">
            <h3>{{ $product->name }}</h3>
            @php
                $dis = $discount->discount;
            @endphp
            @if ($dis)
            @php
                $price_discount = $product->price * (1 - $dis/100);
            @endphp
            <p>
                <span class="item_price">{{ number_format($price_discount) }} {{ trans('messages.$') }}</span>
                <del>- {{ number_format($product->price) }} {{ trans('messages.$') }}</del>
            </p>
            @else
            <p><span class="item_price">{{ number_format($product->price) }} {{ trans('messages.$') }}</span></p>
            @endif
            <div class="rating1">
                <div>Đánh Giá:</div>
                <span class="starRating">
                <input class="rate_point" id="rating5" type="radio" name="rating" value="5" idProduct="{{$product->id}}" idUser="@if (isset(Auth::user()->id)) {{Auth::user()->id}} @endif">
                <label for="rating5">{{ trans('messages.qualtity_1') }}</label>
                <input class="rate_point" id="rating4" type="radio" name="rating" value="4" idProduct="{{$product->id}}" idUser="@if (isset(Auth::user()->id)) {{Auth::user()->id}} @endif">
                <label for="rating4">{{ trans('messages.qualtity_2') }}</label>
                <input class="rate_point" id="rating3" type="radio" name="rating" value="3" idProduct="{{$product->id}}" idUser="@if (isset(Auth::user()->id)) {{Auth::user()->id}} @endif">
                <label for="rating3">{{ trans('messages.qualtity_3') }}</label>
                <input class="rate_point" id="rating2" type="radio" name="rating" value="2" idProduct="{{$product->id}}" idUser="@if (isset(Auth::user()->id)) {{Auth::user()->id}} @endif">
                <label for="rating2">{{ trans('messages.qualtity_4') }}</label>
                <input class="rate_point" id="rating1" type="radio" name="rating" value="1" idProduct="{{$product->id}}" idUser="@if (isset(Auth::user()->id)) {{Auth::user()->id}} @endif">
                <label for="rating1">{{ trans('messages.qualtity_5') }}</label>
                </span>
                <strong class="result_rate" style="margin-left: 10px; font-size: 20px;">{{ number_format($product->rate_point, 2) }}/{{ trans('messages.qualtity_5') }} ({{ $countRate }} Lượt) </strong>
            </div>
            <br>
            <div class="occasional">
                <h5>{{ trans('messages.Types') }}</h5>
                @foreach ($productSize as $ps)
                @php
                    $size = $ps->size;
                @endphp
                <div class="colr">
                    <label class="radio"><input type="radio" name="radio"><i></i>{{ $size->size }}</label>
                </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
            <div class="occasion-cart">
                <a href="" class="item_add single-item hvr-outline-out button2 add_cart_button" itemID="{{ $product->id }}">{{ trans('messages.add_to_cart') }}</a>
            </div>
        </div>
        <div class="clearfix"> </div>
        <div class="bootstrap-tab animated wow slideInUp animated slideInUp1" data-wow-delay=".5s" style="">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                            {{ trans('messages.Description') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">{{ trans('messages.Reviews') }}</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                        <p>
                            <h5>{{ $product->name }}</h5>
                            {{ $product->description }}
                        </p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                        <div class="bootstrap-tab-text-grids">
                            @foreach ($comment as $cmt)
                            <div class="bootstrap-tab-text-grid">
                                <div class="bootstrap-tab-text-grid-left">
                                    <img src="site/images/men3.jpg" alt=" " class="img-responsive">
                                </div>
                                <div class="bootstrap-tab-text-grid-right">
                                    <ul>
                                        @php
                                            $user = $cmt->user;
                                        @endphp
                                        <li><a href="#">{{ $user->name }}</a></li>
                                    </ul>
                                    <p>{{ $cmt->content }}</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            @endforeach
                            <div class="add-review">
                                <h4>{{ trans('messages.Reviews') }}</h4>
                                <form>
                                    <textarea type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '{{trans('messages.Message')}}';}" required="">{{trans('messages.Message')}}
                                    </textarea>
                                    <input type="submit" value="{{ trans('messages.send_1') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //single -->
@endsection
@section('script')
{{ Html::script('js/single.js') }}
@endsection
