{{-- pages/users/list.blade.php --}}
@extends('admin.master')
@section('list-user')
<div class="row">
   <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa fa-bars"></i> {{ trans('user_admin.list_user') }}</h3>
      <ol class="breadcrumb">
         <li><i class="fa fa-home"></i><a href="index.html">{{ trans('master_admin.dashbroad') }}</a></li>
         <li><i class="fa fa-bars"></i>{{ trans('master_admin.user') }}</li>
         <li><i class="fa fa-square-o"></i>{{ trans('user_admin.list_user') }}</li>
      </ol>
   </div>
</div>
<div class="row">
   <div class="col-lg-12">
      <section class="panel">
         <table class="table table-striped table-advance table-hover">
            <tbody>
               <tr>
                  <th><i class="icon_calendar"></i> {{ trans('table_admin.id') }}</th>
                  <th><i class="icon_profile"></i> {{ trans('table_admin.fullname') }}</th>
                  <th><i class="icon_mail_alt"></i> {{ trans('table_admin.email') }}</th>
                  <th><i class="icon_pin_alt"></i> {{ trans('table_admin.city') }}</th>
                  <th><i class="icon_mobile"></i> {{ trans('table_admin.mobile') }}</th>
                  <th><i class="icon_cogs"></i> {{ trans('table_admin.action') }}</th>
               </tr>
               @foreach ($users as $user)
               <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->address }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>
                     <div class="btn-group">
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="fa fa-ban"></i></a>
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
