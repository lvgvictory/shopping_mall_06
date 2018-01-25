{{-- admin/pages/categories/list.blade.php --}}
@extends('admin.master')
@section('list-category')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i>{{ trans('list_category_admin.list_category') }}</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">{{ trans('master_admin.dashbroad') }}</a></li>
            <li><i class="fa fa-bars"></i>{{ trans('master_admin.category') }}</li>
            <li><i class="fa fa-square-o"></i>{{ trans('list_category_admin.list_category') }}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <a href="{{ route('category.create') }}"><button class="add-category btn btn-primary">{{ trans('list_category_admin.add_new') }}</button></a>
    </div>
    <div class="col-lg-12">
        <table class="table table-striped table-advance table-hover">
            <tbody>
                <tr>
                    <th><i class="icon_calendar"></i>{{ trans('table_admin.id') }}</th>
                    <th><i class="icon_profile"></i>{{ trans('table_admin.name_category') }}</th>
                    <th><i class="icon_profile"></i>{{ trans('table_admin.image') }}</th>
                    <th><i class="icon_cogs"></i>{{ trans('table_admin.action') }}</th>
                </tr>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><img src="{{ asset(config("custom.defaultPath") . $category->avatar) }}" class="img-list img-thumbnail"></td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-success" href="{{ route('category.edit', $category->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                        </div>
                        <div class="btn-group">
                            <form method="POST" action="{{ route("category.destroy", $category->id) }}">
                               {{ method_field("DELETE")}}
                               {{ csrf_field() }}
                               <button class="btn btn-danger" type="submit"><i class="icon_close_alt2"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{  $categories->links() }}
    </div>
</div>
@endsection
