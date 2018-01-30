<!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->
<!DOCTYPE html>
<html>
    <head>
        <title>{{ trans('messages.Smart_Shop')}}</title>
        <base href="{{asset('')}}">
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
            Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } 
        </script>
        <!-- //for-mobile-apps -->
        {{ Html::style('library/bootstrap/dist/css/bootstrap.css') }}
        {{ Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}
        {{ Html::style('library/bower_site/pignose.layerslider.css') }}
        <!-- //pignose css -->
        {{ Html::style('site/css/style.css') }}
        {{ Html::style('library/bower_site/jquery-ui.css') }}
        {{ Html::style('library/bower_site/flexslider.css') }}
        {{ Html::style('css/myCss.css') }}
        {{ Html::style('library/toastr/build/toastr.css') }}
        <!-- js -->
        {{ Html::script('library/bower_site/jquery-2.1.4.min.js')}}
        {{ Html::script('library/bower_site/imagezoom.js') }}
        {{ Html::script('library/bower_site/jquery.flexslider.js') }}
        {{ Html::script('library/bower_site/jquery-ui.js') }}
        {{ Html::script('library/bower_site/pignose.layerslider.js') }}
        {{ Html::script('library/bower_site/responsiveslides.min.js') }}
        {{ Html::script('library/bower_site/easyResponsiveTabs.js') }}
        {{ Html::script('js/myJs.js') }}
        <!-- //js -->
        <!-- cart -->
        {{ Html::script('library/bower_site/simpleCart.min.js') }}
        <!-- cart -->
        <!-- for bootstrap working -->
        {{ Html::script('library/bower_site/bootstrap-3.1.1.min.js') }}
        <!-- //for bootstrap working -->
        {{ Html::style('http://fonts.googleapis.com/css?family=Montserrat:400,700') }}
        {{ Html::style('http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic') }}
        {{ Html::script('library/bower_site/jquery.easing.min.js')}}
        {{ Html::script('library/toastr/build/toastr.min.js')}}
        @yield('style')
    </head>
    <body>
        <!-- header -->
        @include('layouts.header')
        <!-- content -->
        @yield('content')
        <!-- //content -->
        <div class="coupons">
            <div class="container">
                <div class="coupons-grids text-center">
                    <div class="col-md-3 coupons-gd">
                        <h3>{{ trans('messages.Buy_your_product_in_a_simple_way') }}</h3>
                    </div>
                    <div class="col-md-3 coupons-gd">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <h4>{{ trans('messages.LOGIN_TO_YOUR_ACCOUNT') }}</h4>
                    </div>
                    <div class="col-md-3 coupons-gd">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <h4>{{ trans('messages.SELECT_YOUR_ITEM') }}</h4>
                    </div>
                    <div class="col-md-3 coupons-gd">
                        <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
                        <h4>{{ trans('messages.MAKE_PAYMENT') }}</h4>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
        @yield('script')
    </body>
</html>
