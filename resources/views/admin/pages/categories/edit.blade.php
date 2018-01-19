{{-- admin/pages/edit.blade.php --}}
@extends('admin.master')

@section('edit-category')
    <div class="row">
       <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="index.html">Dashbroad</a></li>
             <li><i class="fa fa-bars"></i>Category</li>
             <li><i class="fa fa-square-o"></i>Add Category</li>
          </ol>
       </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form class="form-horizontal" method="post" action="{{ route('category.update',  $editCate->id) }}" enctype='multipart/form-data'>
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="control-label col-lg-2" for="tags">Name Category</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control input-lg m-bot15" id="tags" name="name" placeholder="add category here" value="{{ $editCate->name }}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Upload Image</label>
                    <div class="col-lg-2">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                Browse… <input type="file" id="imgInp" name="image" value="">
                            </span>
                        </span>
                        <img id='img-upload' src="{{ asset(config('custom.defaultPath') . $editCate->imgs) }}">
                    </div>
                </div>

                <div class="col-lg-offset-10 col-lg-2">
                    <input type="submit" name="txtSubmit" class=" btn btn-success btn-lg">
                </div>
            </form>
        </div>
    </div>
@endsection
