<div class="header">
    <div class="container"> 
        <ul>
            <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{ trans('messages.Free_and_Fast_Delivery') }} </li>
            <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> {{ trans('messages.Free_shipping_On_all_orders') }} </li>
            <li>
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                <a href="mailto:info@example.com">{{ trans('messages.info@example.com') }}</a>
            </li>
        </ul>
        </div>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="index.html"><img src="site/images/logo3.jpg"></a></h1>
        </div>
        <div class="col-md-6 header-middle">
            <form>
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }} ">--}}
                <div class="search">
                    <input id="keyword" type="search" value="{{ trans('messages.Search') }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '{{ trans('messages.Search') }}';}" required="">
                </div>
                <div class="sear-sub">
                    <input id="search_product" type="submit" value=" ">
                </div>
                
                <div class="clearfix"></div>
                <ul class="search_result"></ul>
            </form>
        </div>
        <div class="col-md-3 header-right footer-bottom">
            @if (Auth::check())
            <div class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" id="header_dropdow">
                    <i class="fa fa-user"></i> @if (isset(Auth::user()->id)) {{Auth::user()->name}} @endif
                    <b class="caret"></b>

                </a>
                <ul class="dropdown-menu extended logout header_ul_margin">
                    <div class="log-arrow-up"></div>
                    @if (Auth::user()->role == 1)
                        <li class="eborder-top d_block">
                            <a href="{{ route('dashbroad') }}"><i class="fa fa-tachometer"> {{ trans('messages.admin') }} </i></a>
                        </li>
                    @endif
                    <li class="eborder-top d_block">
                        <a href="#"><i class="fa fa-user"> {{ trans('messages.manage_user') }} </i></a>
                    </li>
                    <li class="d_block">
                        <a href="{{ route('billcustomer', Auth::user()->id) }}"><i class="fa fa-first-order"> {{ trans('messages.My_order') }} </i></a>
                    </li>
                    <li class="d_block">
                        <a href="{{route('admin.logout')}}"><i class="fa fa-sign-out">{{ trans('messages.Log_Out') }}</i></a>
                    </li>
                </ul>
            </div>
            @else
            <ul>
                <li><a href="{{ route('login')}}" class="use1"><span>{{ trans('messages.Login') }}</span></a>
                </li>
                <li><a class="fb" href="#"></a></li>
                <li><a class="twi" href="#"></a></li>
                <li><a class="insta" href="#"></a></li>
                <li><a class="you" href="#"></a></li>
            </ul>
            @endif
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top header-bottom">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">{{ trans('messages.Toggle_navigation')}}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active menu__item menu__item--current">
                                <a class="menu__link" href="{{ route('home-page') }}"> {{ trans('messages.Home') }} <span class="sr-only">({{ trans('messages.current')}})</span></a>
                            </li>
                            @if (isset($categories))
                                @foreach($categories as $category)
                                    <li class="dropdown menu__item">
                                        <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        {{ $category->name }}
                                        <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu multi-column columns-3">
                                            <div class="row">
                                                <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                                    @php
                                                        $sub = $category->subCategories->first();
                                                    @endphp
                                                    @if (isset($sub))
                                                    <a href="{{ route('mens', $sub->id) }}"><img src="img/images/{{ $category->avatar }}" alt=" "/></a>
                                                    @endif
                                                </div>
                                                <div class="col-sm-3 multi-gd-img">
                                                    <ul class="multi-column-dropdown">
                                                        @if ($category->subCategories)
                                                            @foreach($category->subCategories as $subCate)
                                                            <li><a href="{{ route('mens', $subCate
                                                                ->id)}}">{{ $subCate->name }}</a></li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </ul>
                                    </li>
                                @endforeach
                            @endif
                            <li class=" menu__item"><a class="menu__link" href="{{ route('home-page') }}">{{ trans('messages.contact')  }}</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="top_nav_right">
            <div class="cart box_1">
                <a href="{{ route('showcart')}}">
                    <h3>
                        <div class="total">
                            <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                            <span class="home_cart_total"></span> (<span id="" class="home_count_cart"></span> {{ trans('messages.items') }})
                        </div>
                    </h3>
                </a>
                <p><a href="javascript:;" class="simpleCart_empty">{{ trans('messages.Empty_Cart')}}</a></p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //banner-top -->
