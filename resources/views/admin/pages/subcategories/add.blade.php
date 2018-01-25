{{-- admin/pages/subcategories/add.blade.php --}}
@extends('admin.master')
@section('add-subcategory')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i>{{ trans('master_admin.subcategory') }}</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">{{ trans('master_admin.dashbroad') }}</a></li>
            <li><i class="fa fa-bars"></i>{{ trans('master_admin.subcategory') }}</li>
            <li><i class="fa fa-square-o"></i>{{ trans('add_category_admin.add_subcategory') }}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <form class="form-horizontal" method="post" action="{{ route('sub-category.store') }}" enctype='multipart/form-data'>
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-lg-2" for="tags">{{ trans('add_category_admin.select_category') }}</label>
                <div class="col-lg-10">
                    <select class="form-control input-lg m-bot15" name="categoryId" id="sel1">
                        @foreach($category as $cate)
                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group{{ $errors->has('nameSub') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2" for="tags">{{ trans('add_category_admin.name_subcategory') }}</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control input-lg m-bot15" id="tags" name="nameSub" placeholder="{{ trans('add_category_admin.add_subcategory_here') }}">
                    @if ($errors->has('nameSub'))
                    <span class="help-block">
                    <strong>{{ $errors->first('nameSub') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-offset-10 col-lg-2">
                <input type="submit" name="txtSubmit" value="{{ trans('table_admin.submit') }}" class=" btn btn-success btn-lg">
            </div>
        </form>
    </div>
</div>
@endsection
