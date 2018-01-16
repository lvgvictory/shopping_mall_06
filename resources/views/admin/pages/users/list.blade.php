{{-- pages/users/list.blade.php --}}
@extends('admin.master')
@section('list-user')
<div class="row">
   <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
      <ol class="breadcrumb">
         <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
         <li><i class="fa fa-bars"></i>Pages</li>
         <li><i class="fa fa-square-o"></i>Pages</li>
      </ol>
   </div>
</div>
<div class="row">
   <div class="col-lg-12">
      <section class="panel">
         <header class="panel-heading">
            Advanced Table
         </header>
         <table class="table table-striped table-advance table-hover">
            <tbody>users
               <tr>
                  <th><i class="icon_calendar"></i> ID</th>
                  <th><i class="icon_profile"></i> Full Name</th>
                  <th><i class="icon_mail_alt"></i> Email</th>
                  <th><i class="icon_pin_alt"></i> City</th>
                  <th><i class="icon_mobile"></i> Mobile</th>
                  <th><i class="icon_cogs"></i> Action</th>
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
