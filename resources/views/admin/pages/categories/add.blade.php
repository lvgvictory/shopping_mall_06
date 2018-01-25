{{-- admin/pages/categories/add.blade.php --}}
@extends('admin.master')

@section('add-category')
    <div class="row">
       <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa fa-bars"></i>{{ trans('add_category_admin.add_category') }}</h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="index.html">{{ trans('master_admin.dashbroad') }}</a></li>
             <li><i class="fa fa-bars"></i>{{ trans('master_admin.category') }}</li>
             <li><i class="fa fa-square-o"></i>{{ trans('add_category_admin.add_category') }}</li>
          </ol>
       </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form class="form-horizontal" method="post" action="{{ route('category.store') }}" enctype='multipart/form-data'>
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="control-label col-lg-2" for="tags">{{ trans('add_category_admin.name_category') }}</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control input-lg m-bot15" id="tags" name="name" value="{{ old('name') }}" placeholder="{{ trans('add_category_admin.add_category_here') }}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label class="control-label col-lg-2">{{ trans('add_category_admin.upload_image') }}</label>
                    <div class="col-lg-2">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                {{ trans('add_category_admin.upload') }}<input type="file" id="imgInp" name="image">
                            </span>
                        </span>
                        <img id='img-upload'/>
                    </div>
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-lg-offset-10 col-lg-2">
                    <input type="submit" name="txtSubmit" value="{{ trans('table_admin.submit') }}" class=" btn btn-success btn-lg">
                </div>
            </form>
        </div>
    </div>
@endsection
