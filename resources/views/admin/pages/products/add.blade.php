{{-- admin/pages/products/add.blade.php --}}
@extends('admin.master')
@section('add-product')
<div class="row">
   <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa fa-bars"></i>{{ trans('add_product_admin.add_product') }}</h3>
      <ol class="breadcrumb">
         <li><i class="fa fa-home"></i><a href="{{ route('dashbroad') }}">{{ trans('master_admin.dashbroad') }}</a></li>
         <li><i class="fa fa-bars"></i>{{ trans('master_admin.user') }}</li>
         <li><i class="fa fa-square-o"></i>{{ trans('add_product_admin.add_product') }}</li>
      </ol>
   </div>
</div>
<div class="row">
   <div class="col-lg-8">
      <section class="panel-body">
         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <form class="form-horizontal" action="{{ route('product.store') }}" method="POST" enctype='multipart/form-data'>
            {{ csrf_field() }}
            <div class="form-group">
               <label class="control-label col-lg-2" for="tags">{{ trans('add_category_admin.name_subcategory') }}</label>
               <div class="col-lg-10">
                  <select class="form-control input-lg m-bot15" name="subcategory_id" id="sel1">
                     @foreach($subcategories as $cate)
                     <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
               <label class="control-label col-lg-2" for="tags">{{ trans('add_product_admin.name_product') }}</label>
               <div class="col-lg-10">
                  <input type="text" class="form-control input-lg m-bot15" value="{{ old('name') }}" id="tags" name="name" placeholder="{{ trans('add_product_admin.name_product_here') }}">
                  @if ($errors->has('name'))
                  <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                  </span>
                  @endif
               </div>
            </div>
            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
               <label class="control-label col-lg-2" for="tags">{{ trans('add_product_admin.price') }}</label>
               <div class="col-lg-6">
                  <input type="text" class="form-control input-lg m-bot15" value="{{ old('price') }}" id="tags" name="price" placeholder="{{ trans('add_product_admin.vnd') }}">
                  @if ($errors->has('price'))
                  <span class="help-block">
                  <strong>{{ $errors->first('price') }}</strong>
                  </span>
                  @endif
               </div>
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
               <label class="control-label col-lg-2" for="tags">{{ trans('add_product_admin.description') }} </label>
               <div class="col-lg-10">
                  <textarea class="form-control input-lg m-bot15" name="description" rows="5" id="comment">{{ old('description') }}</textarea>
                  @if ($errors->has('description'))
                  <span class="help-block">
                  <strong>{{ $errors->first('description') }}</strong>
                  </span>
                  @endif
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-lg-2" for="tags">{{ trans('add_product_admin.discount') }} </label>
               <div class="col-lg-6">
                  <select class="form-control input-lg m-bot15" name="discount_id" id="sel1">
                     @foreach($discount as $discount)
                     <option value="{{ $discount->id }}">{{ $discount->discount }}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-lg-2" for="tags">{{ trans('add_product_admin.size') }} </label>
               <div class="col-lg-6">
                  <select multiple class="form-control" name="size_id[]">
                     @foreach($sizes as $size)
                     <option value="{{ $size->id }}">{{ $size->size }}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
               <label class="control-label col-lg-2" for="tags">{{ trans('add_product_admin.piece') }}</label>
               <div class="col-lg-6">
                  <input type="text" class="form-control input-lg m-bot15" value="{{ old('total') }}" id="tags" name="total" placeholder="{{ trans('add_product_admin.piece') }}">
                  @if ($errors->has('total'))
                  <span class="help-block">
                  <strong>{{ $errors->first('total') }}</strong>
                  </span>
                  @endif
               </div>
            </div>
            <div class="form-group{{ $errors->has('photos.*') ? ' has-error' : '' }}">
               <label class="control-label col-lg-2" for="tags">{{ trans('add_product_admin.upload') }} </label>
               <div class="col-lg-6">
                  <label for="InputFile"></label>
                  <input type="file" name="photos[]" multiple id="InputFile">
                  @if ($errors->has('photos.*'))
                  <span class="help-block margin-bottom-0">
                  {{ $errors->first('photos.*') }}
                  </span>
                  @endif
               </div>
            </div>
            <div class="form-group">
               <div class="col-lg-offset-10 col-lg-2">
                  <input type="submit" name="txtSubmit" value="{{ trans('table_admin.submit') }}" class="btn btn-primary btn-lg">
               </div>
            </div>
         </form>
      </section>
   </div>
</div>
@endsection
