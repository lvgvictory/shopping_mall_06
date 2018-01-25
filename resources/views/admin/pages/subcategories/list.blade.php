{{-- admin/pages/subcategories/list.blade.php --}}
@extends('admin.master')
@section('list-subcategory')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> {{ trans('list_category_admin.list_subcategory') }}</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">{{ trans('master_admin.dashbroad') }}</a></li>
            <li><i class="fa fa-bars"></i>{{ trans('master_admin.subcategory') }} </li>
            <li><i class="fa fa-square-o"></i>{{ trans('list_category_admin.list_subcategory') }}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <a href="{{ route('sub-category.create') }}"><button class="add-category btn btn-primary">{{ trans('add_category_admin.add_subcategory') }}</button></a>
    </div>
    <div class="col-lg-12">
        <table class="table table-striped table-advance table-hover">
            <tbody>
                <tr>
                    <th><i class="icon_calendar"></i> {{ trans('table_admin.id') }}</th>
                    <th><i class="icon_document_alt"></i> {{trans('table_admin.name_subcategory') }}</th>
                    <th><i class="fa fa-id-card"></i> {{ trans('table_admin.name_category') }}</th>
                    <th><i class="icon_cogs"></i> {{ trans('table_admin.action') }}</th>
                </tr>
                @foreach ($subCategories as $subCategory)
                <tr>
                    <td>{{ $subCategory->id }}</td>
                    <td>{{ $subCategory->name }}</td>
                    <td>{{ $subCategory->category_id }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-success"
                                href="{{ route('sub-category.edit', [
                                'subcategory' => $subCategory->id
                                ]) }}"><i class="fa fa-pencil-square-o"></i></a>
                        </div>
                        <div class="btn-group">
                            <form method="POST" action="{{ route("sub-category.destroy", $subCategory->id) }}">
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
        {{  $subCategories->links() }}
    </div>
</div>
@endsection
