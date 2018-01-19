{{-- admin/pages/list.blade.php --}}
@extends('admin.master')

@section('list-category')
    <div class="row">
       <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="index.html">Dashbroad</a></li>
             <li><i class="fa fa-bars"></i>Category </li>
             <li><i class="fa fa-square-o"></i>List Category</li>
          </ol>
       </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <a href="{{ route('category.create') }}"><button class="add-category btn btn-primary">Add New Category</button></a>
        </div>
        <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                    <tr>
                        <th><i class="icon_calendar"></i> ID</th>
                        <th><i class="icon_profile"></i>Name Category</th>
                        <th><i class="icon_profile"></i>Image</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td><img src="{{ asset(config("custom.defaultPath") . $category->imgs) }}" class="img-list img-thumbnail"></td>
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
