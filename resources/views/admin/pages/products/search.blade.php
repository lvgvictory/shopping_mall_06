{{-- pages/products/search.blade.php --}}
@extends('admin.master')
@section('search-product')
<div class="row">
   <div class="col-lg-8">
      <h3 class="page-header"><i class="fa fa fa-bars"></i> {{ trans('list_product_admin.list_product') }}</h3>
   </div>
   {{-- start search --}}
   <div class="col-lg-4">
      <ul class="nav top-menu search-product">
         <li>
            <form class="navbar-form" action="{{ route('search.product') }}">
               <input class="form-control search" id="search" name="key" placeholder="{{ trans('master_admin.search') }}" type="text">
               <input type="submit" name="txtSubmit" class="btn btn-default btn-sm">
            </form>
         </li>
      </ul>
   </div>
   {{-- end search --}}
   <div class="col-lg-12">
      <ol class="breadcrumb">
         <li><i class="fa fa-home"></i><a href="index.html">{{ trans('master_admin.dashbroad') }}</a></li>
         <li><i class="fa fa-bars"></i> {{ trans('list_product_admin.product') }}</li>
         <li><i class="fa fa-square-o"></i> {{ trans('list_product_admin.list_product') }}</li>
      </ol>
   </div>
   <div class="col-lg-12">
      <h3>{{ trans('table_admin.result') }} {{ count($product) }}</h3>
   </div>
</div>
<div class="row">
   <div class="col-lg-12">
      <section class="panel">
         <table class="table table-striped table-advance table-hover">
            <tbody>
               <tr>
                  <th><i class="icon_calendar"></i> {{ trans('table_admin.id') }}</th>
                  <th><i class="icon_profile"></i> {{ trans('table_admin.name_product') }}</th>
                  <th><i class="fa fa-money"></i> {{ trans('table_admin.price') }}</th>
                  <th><i class="fa fa-book"></i> {{ trans('table_admin.description') }}</th>
                  <th><i class="fa fa-file-text-o"></i> {{ trans('table_admin.name_subcategory') }}</th>
                  <th><i class="icon_cogs"></i> {{ trans('table_admin.action') }}</th>
               </tr>
               @foreach ($product as $product)
               <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->description }}</td>
                  @php
                    $subCate = $product->subCategory;
                  @endphp
                  <td>{{ $subCate->name }}</td>
                  <td>
                     <div class="btn-group">
                        <a class="btn btn-success" href="#"><i class="fa fa-pencil-square-o"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                     </div>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </section>
   </div>
</div>
@endsection
