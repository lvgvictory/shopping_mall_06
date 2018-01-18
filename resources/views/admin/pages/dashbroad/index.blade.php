{{-- admin/pages/dashbroad/index.blade.php --}}
@extends('admin.master')

@section('index')
   <div class="row">
      <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
         <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-bars"></i>Pages</li>
            <li><i class="fa fa-square-o"></i>Pages</li>
         </ol>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         <div class="info-box blue-bg">
            <i class="fa fa-cloud-download"></i>
            <div class="count">6.674</div>
            <div class="title">Download</div>
         </div>
         <!--/.info-box-->
      </div>
      <!--/.col-->
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         <div class="info-box brown-bg">
            <i class="fa fa-shopping-cart"></i>
            <div class="count">7.538</div>
            <div class="title">Purchased</div>
         </div>
         <!--/.info-box-->
      </div>
      <!--/.col-->
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         <div class="info-box dark-bg">
            <i class="fa fa-thumbs-o-up"></i>
            <div class="count">4.362</div>
            <div class="title">Order</div>
         </div>
         <!--/.info-box-->
      </div>
      <!--/.col-->
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         <div class="info-box green-bg">
            <i class="fa fa-cubes"></i>
            <div class="count">1.426</div>
            <div class="title">Stock</div>
         </div>
         <!--/.info-box-->
      </div>
      <!--/.col-->
   </div>
@endsection
