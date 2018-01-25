{{-- admin/pages/subcategories/add.blade.php --}}
@extends('admin.master')

@section('add-subcategory')
    <div class="row">
       <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="index.html">Dashbroad</a></li>
             <li><i class="fa fa-bars"></i>SubCategory</li>
             <li><i class="fa fa-square-o"></i>Edit SubCategory</li>
          </ol>
       </div>
    </div>
    {{-- {{ dd ($subCategories) }} --}}
    <div class="row">
        <div class="col-lg-8">
            <form class="form-horizontal" method="post" action="{{ route('sub-category.update', $editSubCate->id) }}" enctype='multipart/form-data'>
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-lg-2" for="tags">Select Category(select one):</label>
                    <div class="col-lg-10">
                        <select class="form-control input-lg m-bot15" name="categoryId" id="sel1">
                            <option value="{{ $cate->id }}" disabled selected="">{{ $cate->name }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('nameSub') ? ' has-error' : '' }}">
                    <label class="control-label col-lg-2" for="tags">Name SubCategory</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control input-lg m-bot15" id="tags" name="nameSub" placeholder="add subcategory here" value="{{ $editSubCate->name }}">
                        @if ($errors->has('nameSub'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nameSub') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-offset-10 col-lg-2">
                    <input type="submit" name="txtSubmit" class=" btn btn-success btn-lg">
                </div>
            </form>
        </div>
    </div>
@endsection
