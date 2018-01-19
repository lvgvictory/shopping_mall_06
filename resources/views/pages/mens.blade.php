@extends('layouts.master')
@section('style')
{{ Html::style('css/myCss.css') }}
@endsection
@section('content')
<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3>{{ $cate->name }}</h3>
    </div>
</div>
<!-- //banner -->
<!-- mens -->
<div class="men-wear">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="filter-price">
                <h3>{{ trans('messages.Filter_By_Price') }}</h3>
                <ul class="dropdown-menu6">
                    <li>
                        <div id="slider-range"></div>
                        <input type="text" id="amount"/>
                    </li>
                </ul>
                <!---->
                {{ Html::script('library/bower_site/jquery-ui.js') }}
                <!---->
            </div>
            <div class="css-treeview">
                <h4>{{ $cate->name }}</h4>
                <ul class="tree-list-pad">
                    <li>
                        <input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><span></span>{{ $cate->name }}</label>
                        <ul>
                            @foreach ($categories as $subCate)
                            <li>
                            <li><a href="{{ route('mens', $subCate->id) }}">{{ $subCate->name }}</a></li>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="community-poll">
                <h4>{{ trans('messages.Community_Poll') }}</h4>
                <div class="swit form">
                    <form>
                        <div class="check_box">
                            <div class="radio">
                                <label>
                                <input type="radio" name="radio" checked=""><i></i>{{ trans('messages.More_convenient_for_shipping_and_delivery') }}
                                </label>
                            </div>
                        </div>
                        <div class="check_box">
                            <div class="radio"> <label><input type="radio" name="radio"><i></i>{{ trans('messages.Lower_Price') }}</label> </div>
                        </div>
                        <div class="check_box">
                            <div class="radio"> <label><input type="radio" name="radio"><i></i>{{ trans('messages.Track_your_item') }}</label> </div>
                        </div>
                        <div class="check_box">
                            <div class="radio"> <label><input type="radio" name="radio"><i></i>{{ trans('messages.Bigger_Choice') }}</label> </div>
                        </div>
                        <div class="check_box">
                            <div class="radio"> <label><input type="radio" name="radio"><i></i>{{ trans('messages.More_colors_to_choose') }}</label> </div>
                        </div>
                        <div class="check_box">
                            <div class="radio"> <label><input type="radio" name="radio"><i></i>{{ trans('messages.Secured_Payment') }}</label> </div>
                        </div>
                        <div class="check_box">
                            <div class="radio"> <label><input type="radio" name="radio"><i></i>{{ trans('messages.Money_back_guaranteed') }}</label> </div>
                        </div>
                        <div class="check_box">
                            <div class="radio"> <label><input type="radio" name="radio"><i></i>{{ trans('messages.Others') }}</label> </div>
                        </div>
                        <input type="submit" value="{{ trans('messages.SEND') }}">
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-8 products-right">
            <h5>{{ trans('messages.Product_Compare') }}</h5>
            <div class="sort-grid">
                <div class="sorting">
                    <h6>{{ trans('messages.Sort_By') }}</h6>
                    <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                        <option value="null">{{ trans('messages.Default') }}</option>
                        <option value="null">{{ trans('messages.Name_A_Z') }}</option>
                        <option value="null">{{ trans('messages.Name_Z_A') }}</option>
                        <option value="null">{{ trans('messages.Price_High_Low') }}</option>
                        <option value="null">{{ trans('messages.Price_Low_High') }}</option>
                    </select>
                    <div class="clearfix"></div>
                </div>
                <div class="sorting">
                    <h6>{{ trans('messages.Showing') }}</h6>
                    <select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
                        <option value="null">{{ trans('messages.product_7') }}</option>
                        <option value="null">{{ trans('messages.product_14') }}</option>
                        <option value="null">{{ trans('messages.product_28') }}</option>
                        <option value="null">{{ trans('messages.product_35') }}</option>
                    </select>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="men-wear-top">
                {{ Html::script('library/bower_site/easyResponsiveTabs.js') }}
                <div  id="top" class="callbacks_container">
                    <ul class="rslides" id="slider3">
                        @foreach ($slide as $sl)
                        <li>
                            <img class="img-responsive" src="site/images/{{ $sl->image }}" alt=" "/>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="men-wear-bottom">
                <div class="col-sm-4 men-wear-left">
                    <img class="img-responsive" src="site/images/men3.jpg" alt=" " />
                </div>
                <div class="col-sm-8 men-wear-right">
                    <h4>{{ trans('messages.Exclusive_Mens_Collections') }}</h4>
                    <p>{{ trans('messages.text_1') }}</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="single-pro">
            @foreach ($products as $product)
            <div class="col-md-3 product-men yes-marg">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">
                        @php
                        $img = $product->images->first();
                        @endphp
                        <img src="site/images/{{ $img->image }}" alt="" class="pro-image-front">
                        <img src="site/images/{{ $img->image }}" alt="" class="pro-image-back">
                        <div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="{{ route('single', $product->id) }}" class="link-product-add-cart">{{ trans('messages.Quick_View') }}</a>
                            </div>
                        </div>
                        <span class="product-new-top">{{ trans('messages.new') }}</span>
                    </div>
                    <div class="item-info-product ">
                        <h4><a href="{{ route('single', $product->id) }}">{{ $product->name }}</a></h4>
                        @php
                        $discount = $product->discount;
                        $dis = $discount->discount;
                        @endphp
                        <div class="info-product-price">
                            @if ($dis)
                            @php
                            $price_discount = $product->price * (1 - $dis/100);
                            @endphp
                            <span class="item_price">{{ number_format($price_discount) }} {{ trans('messages.$') }}</span>
                            <del>{{ number_format($product->price) }} {{ trans('messages.$') }}</del>
                            @else
                            <span class="item_price">{{ number_format($product->price) }} {{ trans('messages.$') }}</span>
                            @endif
                        </div>
                        <a href="#" class="item_add single-item hvr-outline-out button2">{{ trans('messages.add_to_cart') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
        <div class="container" align="center">
            {{ $page->links() }}
        </div>
    </div>
</div>
<!-- //mens -->
@endsection
@section('script')
{{ Html::script('js/mens.js')}}
@endsection
