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
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="index.html"><img src="site/images/logo3.jpg"></a></h1>
        </div>
        <div class="col-md-6 header-middle">
            <form>
                <div class="search">
                    <input type="search" value="{{ trans('messages.Search') }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '{{ trans('messages.Search') }}';}" required="">
                </div>
                <div class="section_room">
                    <select id="country" onchange="change_country(this.value)" class="frm-field required">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="sear-sub">
                    <input type="submit" value=" ">
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="col-md-3 header-right footer-bottom">
            <ul>
                <li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>{{ trans('messages.Login') }}</span></a>
                </li>
                <li><a class="fb" href="#"></a></li>
                <li><a class="twi" href="#"></a></li>
                <li><a class="insta" href="#"></a></li>
                <li><a class="you" href="#"></a></li>
            </ul>
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
                                <a class="menu__link" href="index.html"> {{ trans('messages.Home') }} <span class="sr-only">({{ trans('messages.current')}})</span></a>
                            </li>
                            @foreach($categories as $category)
                                <li class="dropdown menu__item">
                                    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        {{ $category->name }}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="row">
                                            <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                                <a href="mens.html"><img src="site/images/{{ $category->avatar }}" alt=" "/></a>
                                            </div>
                                            
                                            <div class="col-sm-3 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    @foreach($category->subCategories as $subCate)
                                                        <li><a href="mens.html">{{ $subCate->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            
                                            {{-- <div class="col-sm-3 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="mens.html">Jewellery</a></li>
                                                    <li><a href="mens.html">Sunglasses</a></li>
                                                    <li><a href="mens.html">Perfumes</a></li>
                                                    <li><a href="mens.html">Beauty</a></li>
                                                    <li><a href="mens.html">Shirts</a></li>
                                                    <li><a href="mens.html">Sunglasses</a></li>
                                                    <li><a href="mens.html">Swimwear</a></li>
                                                </ul>
                                            </div> --}}
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>
                            @endforeach
                            {{-- <li class=" menu__item"><a class="menu__link" href="electronics.html">Electronics</a></li>
                            <li class=" menu__item"><a class="menu__link" href="codes.html">Short Codes</a></li> --}}
                            <li class=" menu__item"><a class="menu__link" href="contact.html">{{ trans('messages.contact')  }}</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="top_nav_right">
            <div class="cart box_1">
                <a href="checkout.html">
                    <h3>
                        <div class="total">
                            <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                            <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> {{ trans('messages.items') }})
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
