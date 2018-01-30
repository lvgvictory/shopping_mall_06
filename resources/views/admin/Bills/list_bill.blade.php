@extends('admin.master')

@section('list-category')
    <div class="row">
       <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa fa-bars"></i> {{ trans('messages.Pages') }} </h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="index.html"> {{ trans('master_admin.dashbroad') }} </a></li>
             <li><i class="fa fa-bars"></i> {{ trans('messages.bill') }} </li>
             <li><i class="fa fa-square-o"></i> {{ trans('messages.list') }} </li>
          </ol>
       </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-2">
                    <h4> {{ trans('messages.status') }} </h4>
                    <select class="form-control m-bot15" id="change_status">
                        <option value="5"> {{ trans('messages.all') }} </option>
                        <option value="0"> {{ trans('messages.pending') }} </option>
                        <option value="1"> {{ trans('messages.confirm') }} </option>
                        <option value="2"> {{ trans('messages.done') }} </option>
                        <option value="3"> {{ trans('messages.Cancel') }} </option>
                    </select>
                </div>
            </div>
            <table class="table table-striped table-advance table-hover filter-bill">
                <tbody>
                    <tr>
                        <th> {{ trans('messages.ID') }} </th>
                        <th><i class="icon_profile"></i> {{ trans('messages.name') }} </th>
                        <th><i class="icon_mail_alt"></i> {{ trans('messages.Email') }} </th>
                        <th><i class="icon_pin_alt"></i> {{ trans('messages.DC') }} </th>
                        <th><i class="icon_mobile"></i> {{ trans('messages.SDT') }} </th>
                        <th><i class="glyphicon glyphicon-subtitles"></i> {{ trans('messages.messages') }} </th>
                        <th><i class="icon_cogs"></i> {{ trans('messages.payment') }} </th>
                        <th><i class="glyphicon glyphicon-eur"></i> {{ trans('messages.Total_price') }} </th>
                        <th><i class="icon_cogs"></i> {{ trans('messages.status') }} </th>
                        <th><i class="icon_calendar"></i> {{ trans('messages.date') }} </th>
                        <th><i class="icon_cogs"></i> {{ trans('messages.detail') }} </th>
                        <th><i class="icon_cogs"></i> {{ trans('messages.Remove') }} </th>
                    </tr>
                    @foreach ($bills as $bill)
                    <tr>
                        @php
                            $us = $bill->user;
                        @endphp
                        <td>{{ $bill->id }}</td>
                        <td>{{ $bill->full_name }}</td>
                        <td>{{ $us->email }}</td>
                        <td>{{ $bill->address }}</td>
                        <td>{{ $us->phone }}</td>
                        <td>{{ $bill->message }}</td>
                        <td>{{ $bill->payment }}</td>
                        <td>{{ $bill->total_price }}</td>
                        @if ( $bill->active == 0)
                        <td>{{ 'Đang Chờ' }}</td>
                        @elseif ($bill->active == 1)
                        <td>{{ 'Xác Nhận' }}</td>
                        @elseif ($bill->active == 2)
                        <td>{{ 'Hoàn Thành' }}</td>
                        @else
                        <td>{{ 'Hủy Bỏ' }}</td>
                        @endif
                        <td>{{ $bill->created_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info" href="{{ route('listbilldetail', $bill->id) }}"><i class="fa fa-info"></i></a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="{{ route('deletebill', $bill->id) }}" onclick="return confirm('Bạn có chắc là muốn xóa?')"><i class="fa fa-trash-o"></i> {{ trans('messages.Remove') }} 
                                </a> 
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $bills->links() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{ Html::script('js/admin/bill.js')}}
@endsection
