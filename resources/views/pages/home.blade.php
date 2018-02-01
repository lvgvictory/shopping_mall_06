@extends('layouts.master')
@section('style')
{{ Html::style('css/myCss.css')}}
@endsection
@section('content')
@include('layouts.slide')
<div class="new_arrivals">
    <div class="container">
        <h3><span> {{ trans('messages.arrivals') }} </span></h3>
        <div class="new_grids">
            <div class="col-md-4 new-gd-left">
                <img src="site/images/wed1.jpg" alt=" " />
                <div class="wed-brand simpleCart_shelfItem">
                </div>
            </div>
            <div class="col-md-4 new-gd-middle">
                <div class="new-levis">
                    <div class="mid-img">
                        <img src="site/images/levis1.png" alt=" " />
                    </div>
                    <div class="mid-text">
                        <h4>{{ trans('messages.up_to_40%') }} <span> {{ trans('messages.off') }} </span></h4>
                        <a class="hvr-outline-out button2" href="{{ route('home-page') }}"> {{ trans('messages.Shop_now') }} </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="new-levis">
                    <div class="mid-text">
                        <h4>{{ trans('messages.up_to_50%') }} <span>{{ trans('messages.off') }}</span></h4>
                        <a class="hvr-outline-out button2" href="{{ route('home-page') }}"> {{ trans('messages.Shop_now') }} </a>
                    </div>
                    <div class="mid-img">
                        <img src="site/images/dig.jpg" alt=" " />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 new-gd-left">
                <img src="site/images/wed2.jpg" alt=" " />
                <div class="wed-brandtwo simpleCart_shelfItem">
                    <h4>{{ trans('messages.Spring_/_Summer') }}</h4>
                    <p>{{ trans('messages.Shop_Men') }}</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- content-bottom -->
<div class="content-bottom">
    <div class="col-md-7 content-lgrid">
        <div class="col-sm-6 content-img-left text-center">
            <div class="content-grid-effect slow-zoom vertical">
                <div class="img-box"><img src="site/images/p1.jpg" alt="image" class="img-responsive zoom-img"></div>
                <div class="info-box">
                    <div class="info-content simpleCart_shelfItem">
                        <span class="separator"></span>
                        <span class="separator"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 content-img-right">
            <h3>{{ trans('messages.Special_Offers_and_50%') }}<span>{{ trans('messages.Discount_On') }}</span></h3>
        </div>
        <div class="col-sm-6 content-img-right">
            <h3>{{ trans('messages.Buy_1_get_1_free_on') }} <span> {{trans('messages.Branded') }} </span></h3>
        </div>
        <div class="col-sm-6 content-img-left text-center">
            <div class="content-grid-effect slow-zoom vertical">
                <div class="img-box"><img src="site/images/p2.jpg" alt="image" class="img-responsive zoom-img"></div>
                <div class="info-box">
                    <div class="info-content simpleCart_shelfItem">
                        <span class="separator"></span>
                        <span class="separator"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-5 content-rgrid text-center">
        <div class="content-grid-effect slow-zoom vertical">
            <div class="img-box"><img src="site/images/p4.jpg" alt="image" class="img-responsive zoom-img"></div>
            <div class="info-box">
                <div class="info-content simpleCart_shelfItem">
                    <span class="separator"></span>
                    <span class="separator"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- //content-bottom -->
<!-- product-nav -->
<div class="product-easy">
    <div class="container">
        {{ Html::script('library/bower_site/easyResponsiveTabs.js') }}
        <div class="sap_tabs">
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab">
                        <span>{{ trans('messages.Latest_Designs') }}</span>
                    </li>
                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab">
                        <span>{{ trans('messages.Special_Offers') }}</span>
                    </li>
                    <li class="resp-tab-item" aria-controls="tab_item-2" role="tab">
                        <span>{{ trans('messages.Collections') }}</span>
                    </li>
                </ul>
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                        @foreach($products as $product)
                        <div class="col-md-3 product-men yes-marg">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    @php
                                    $image = $product->images->first();
                                    @endphp
                                    <img src="site/images/{{ $image->image }}" alt="" class="pro-image-front">
                                    <img src="site/images/{{ $image->image }}" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{ route('single', $product->id) }}" class="link-product-add-cart">
                                                {{ trans('messages.Quick_View') }}
                                            </a>
                                        </div>
                                    </div>
                                    <span class="product-new-top"> {{ trans('messages.new') }} </span>
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="{{ route('single', $product->id) }}">{{ $product->name }}</a></h4>
                                    <div class="info-product-price">
                                        @php
                                        $discount = $product->discount->first();
                                        $proDiscount = $discount->discount;
                                        @endphp
                                        @if ($proDiscount)
                                        @php
                                        $price_discount = ($product->price * (1 - $proDiscount/100));
                                        @endphp
                                        <span class="item_price"> {{ number_format($price_discount, 0, ",", ".") }} {{ trans('messages.$') }} </span>
                                        <del>{{ number_format($product['price'], 0, ",", ".") }} {{ trans('messages.$') }}</del>

                                        @else
                                        <span class="item_price"> {{ number_format($product['price'], 0, ",", ".") }} {{ trans('messages.$') }} </span>

                                        @endif
                                    </div>
                                    <a href="" class="item_add single-item hvr-outline-out button2 add_cart_button" itemID="{{ $product->id }}">{{ trans('messages.add_to_cart') }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="clearfix"></div>
                        <div class="container" align="center">
                            {{ $products->links() }}
                        </div>

                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                        @foreach($listProduct as $product)
                        <div class="col-md-3 product-men yes-marg">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    @php
                                    $image = $product->images->first();
                                    @endphp
                                    <img src="site/images/{{ $image->image }}" alt="" class="pro-image-front">
                                    <img src="site/images/{{ $image->image }}" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{ route('single', $product->id) }}" class="link-product-add-cart">
                                                {{ trans('messages.Quick_View') }}
                                            </a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">{{ trans('messages.new') }}</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="{{ route('single', $product->id) }}">{{ $product->name }}</a></h4>
                                    <div class="info-product-price">
                                        @php
                                        $discount = ($product->discount/100);
                                        $price_discount = ($product->price * (1 - $discount));
                                        @endphp
                                        <span class="item_price">{{ number_format($price_discount, 0, ",", ".") }} {{ trans('messages.$') }}</span>
                                        <del>{{ number_format($product['price'], 0, ",", ".") }} {{ trans('messages.$') }}</del>
                                    </div>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">
                                        {{ trans('messages.add_to_cart') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                        <div class="container" align="center">
                            {{ $listProduct->links() }}
                        </div>
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                        @foreach($rateProducts as $product)
                        <div class="col-md-3 product-men yes-marg">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    @php
                                    $image = $product->images->first();
                                    @endphp
                                    <img src="site/images/{{ $image->image }}" alt="" class="pro-image-front">
                                    <img src="site/images/{{ $image->image }}" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{ route('single', $product->id) }}" class="link-product-add-cart">
                                                {{ trans('messages.Quick_View') }}
                                            </a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">{{ trans('messages.new') }}</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="{{ route('single', $product->id) }}">{{ $product->name }}</a></h4>
                                    <div class="info-product-price">
                                        @php
                                        $discount = $product->discount->first();
                                        $proDiscount = $discount->discount;
                                        @endphp
                                        @if ($proDiscount)
                                        @php
                                        $price_discount = ($product->price * (1 - $proDiscount/100));
                                        @endphp
                                        <span class="item_price"> {!! number_format($price_discount, 0, ",", ".") !!} {{ trans('messages.$') }} </span>
                                        <del>{!! number_format($product->price) !!} {{ trans('messages.$') }}</del>
                                        @else
                                        <span class="item_price"> {!! number_format($product['price'], 0, ",", ".") !!} {{ trans('messages.$') }} </span>
                                        @endif
                                    </div>
                                    <a href="" class="item_add single-item hvr-outline-out button2 add_cart_button" itemID="{{ $product->id }}">{{ trans('messages.add_to_cart') }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                        <div class="container" align="center">
                            {{ $rateProducts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //product-nav -->
@endsection
@section('script')
{{ Html::script('js/home.js') }}
@endsection
