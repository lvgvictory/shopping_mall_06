<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">
        <title>{{ trans('master_admin.title') }}</title>
        <!-- Bootstrap CSS -->
        <!-- Latest compiled and minified CSS -->
        <link href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('library/bootstrap/dist/css/bootstrap-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('library/toastr/build/toastr.min.css') }}" rel="stylesheet">
        <!-- bootstrap theme -->
        <!--external css-->
        <!-- font icon -->
        <link href="{{ asset('library/elegant-icons/elegant-icons-style.css') }}" rel="stylesheet">
        <link href="{{ asset('library/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin/line-icons.css') }}" rel="stylesheet">
        <!-- Custom styles -->
        <link href="{{ asset('css/admin/style-admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin/upload-file.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin/style-responsive.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- container section start -->
        <section id="container" class="">
            <!--header start-->
            <header class="header dark-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                </div>
                <!--logo start-->
                <a href="index.html" class="logo">{{ Auth::user()->name }}<span class="lite"><small>{{ trans('master_admin.admin') }}</small></span></a>
                <!--logo end-->
                <div class="nav search-row" id="top_menu">
                    <!--  search form start -->
                    <ul class="nav top-menu">
                        <li>
                            <form class="navbar-form">
                                <input class="form-control" placeholder="{{ trans('master_admin.search') }}" type="text">
                            </form>
                        </li>
                    </ul>
                    <!--  search form end -->
                </div>
                <div class="top-nav notification-row">
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu">
                        <!-- task notificatoin start -->
                        <li id="task_notificatoin_bar" class="dropdown">
                            <a class="dropdown-toggle" href="{{ route('home-page') }}">
                            <i class="icon_house_alt"></i>
                            </a>
                        </li>
                        <!-- task notificatoin end -->
                        <!-- inbox notificatoin start-->
                        <li id="mail_notificatoin_bar" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important">{{ trans('master_admin.5') }}</span>
                            </a>
                            <ul class="dropdown-menu extended inbox">
                                <div class="notify-arrow notify-arrow-blue"></div>
                                <li>
                                    <p class="blue">{{ trans('master_admin.message') }}</p>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{ asset('img/avatar-mini.jpg') }}"></span>
                                    <span class="subject">
                                    <span class="from">{{ Auth::user()->name }}</span>
                                    <span class="time">{{ trans('master_admin.one_min') }}</span>
                                    </span>
                                    <span class="message">
                                    {{ trans('master_admin.i_like_it') }}
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">{{ trans('master_admin.all_message') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- inbox notificatoin end -->
                        <!-- alert notification start-->
                        <li id="alert_notificatoin_bar" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important">{{ trans('master_admin.5') }}</span>
                            </a>
                            <ul class="dropdown-menu extended notification">
                                <div class="notify-arrow notify-arrow-blue"></div>
                                <li>
                                    <p class="blue">{{ trans('master_admin.notification') }}</p>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span>
                                    {{ trans('master_admin.buy_product') }}
                                    <span class="small italic pull-right">{{ trans('master_admin.one_min') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">{{ trans('master_admin.all_notification') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- alert notification end-->
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                            <img alt="" src="{{ asset('img/avatar1_small.jpg') }}">
                            </span>
                            <span class="username">{{ Auth::user()->name }}</span>
                            <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="#"><i class="icon_profile"></i>{{ trans('master_admin.profile') }}</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon_mail_alt"></i>{{ trans('master_admin.box') }}</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon_chat_alt"></i>{{ trans('master_admin.chat') }}</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.logout')}}"><i class="icon_key_alt"></i>{{ trans('master_admin.logout') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!-- notificatoin dropdown end-->
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->
            <aside>
                <div id="sidebar" class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu">
                        <li class="">
                            <a class="" href="{{ route('dashbroad') }}">
                            <i class="icon_house_alt"></i>
                            <span>{{ trans('master_admin.dashbroad') }}</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                            <i class="icon_document_alt"></i>
                            <span>{{ trans('master_admin.category') }}</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="{{ route('category.create') }}">{{ trans('master_admin.add') }}</a></li>
                                <li><a class="" href="{{ route('category.index') }}">{{ trans('master_admin.list') }}</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                            <i class="icon_desktop"></i>
                            <span>{{ trans('master_admin.subcategory') }}</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="{{ route('sub-category.create') }}">{{ trans('master_admin.add') }}</a></li>
                                <li><a class="" href="{{ route('sub-category.index') }}">{{ trans('master_admin.list') }}</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                            <i class="icon_table"></i>
                            <span>{{ trans('master_admin.user') }}</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="{{ route('user') }}">{{ trans('master_admin.list') }}</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu ">
                            <a href="javascript:;" class="">
                            <i class="icon_documents_alt"></i>
                            <span>{{ trans('master_admin.product') }}</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="profile.html">{{ trans('master_admin.add') }}</a></li>
                                <li><a class="" href="login.html"><span>{{ trans('master_admin.list') }}</span></a></li>
                            </ul>
                        </li>
                        <li class="sub-menu ">
                            <a href="javascript:;" class="">
                            <i class="icon_documents_alt"></i>
                            <span> Hóa Đơn </span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="{{ route('listbill') }}">Danh sách hóa đơn</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <!-- page start-->
                    @yield('list-user')
                    @yield('index')
                    @yield('list-category')
                    @yield('add-category')
                    @yield('edit-category')
                    @yield('list-subcategory')
                    @yield('add-subcategory')
                    @yield('edit-subcategory')
                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
            <div class="text-right">
                <div class="credits">
                    <!--
                        All the links in the footer should remain intact.
                        You can delete the links only if you purchased the pro version.
                        Licensing information: https://bootstrapmade.com/license/
                        Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                        -->
                    <a href="" class="col-lg-offset-8 col-lg-4">{{ trans('master_admin.author') }}</a>
                </div>
            </div>
        </section>
        <!-- container section end -->
        <!-- javascripts -->
        <script src="{{ asset('library/bower-front-end-admin/js/jquery.js') }}"></script>
        <script src="{{ asset('library/toastr/build/toastr.min.js') }}"></script>
        <script src="{{ asset('library/bower-front-end-admin/js/bootstrap.min.js') }}"></script>
        <!-- nice scroll -->
        <script src="{{ asset('library/bower-front-end-admin/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('library/bower-front-end-admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <!--custome script for all page-->
        <script src="{{ asset('js/admin/scripts.js') }}"></script>
        <script src="{{ asset('js/admin/upload-file.js') }}"></script>
        <script>
        @if(Session::has('message'))
          var type = "{{ Session::get('alert-type', 'info') }}";
          switch(type){
              case 'info':
                  toastr.info("{{ Session::get('message') }}");
                  break;

              case 'warning':
                  toastr.warning("{{ Session::get('message') }}");
                  break;

              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;

              case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
          }
        @endif
        </script>
        @yield('script')
    </body>
</html>

