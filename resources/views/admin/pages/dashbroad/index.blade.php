{{-- admin/pages/dashbroad/index.blade.php --}}
@extends('admin.master')

@section('index')
   <div class="row">
      <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa fa-bars"></i>{{ trans('master_admin.dashbroad') }}</h3>
         <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">{{ trans('master_admin.dashbroad') }}</a></li>
         </ol>
      </div>
   </div>
   <div class="row">

      <!--/.col-->
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         <div class="info-box brown-bg">
            <i class="fa fa-shopping-cart"></i>
            <div class="count">{{ trans('index_admin.number_test') }}</div>
            <div class="title">{{ trans('index_admin.order') }}</div>
         </div>
      </div>
   </div>
@endsection
