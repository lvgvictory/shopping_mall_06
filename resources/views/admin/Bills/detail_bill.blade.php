@extends('admin.master')

@section('list-category')
    <div class="row">
       <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa fa-bars"></i> {{ trans('messages.PagesBill') }} </h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="index.html"> {{ trans('master_admin.dashbroad') }} </a></li>
             <li><i class="fa fa-bars"></i> {{ trans('messages.bill') }} </li>
             <li><i class="fa fa-square-o"></i>
                <strong> {{ trans('messages.PagesBill') }} - 
                @if (isset($bill))
                    {{ $bill->id }}
                     - {{ trans('messages.status') }}: 
                    <i class="active_bills">
                    @if ($bill->active == 0)
                        {{ 'Đang Chờ' }}
                    @elseif ($bill->active == 1)
                        {{ 'Xác Nhận' }}
                    @elseif($bill->active == 2)
                        {{ 'Hoàn Thành' }}
                    @else
                        {{ 'Hủy Bỏ' }}
                    @endif
                    </i>
                @endif
                </strong>
            </li>
          </ol>
       </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                    <tr>
                        <th> {{ trans('messages.ID') }} </th>
                        <th><i class="icon_profile"></i> {{ trans('messages.Product_Name') }} </th>
                        <th><i class="icon_cogs"></i> {{ trans('messages.Quality') }} </th>
                        <th><i class="glyphicon glyphicon-eur"></i> {{ trans('messages.Price') }} </th>
                    </tr>
                    @foreach ($bill_detail as $bd)
                    <tr>
                        @php
                            $product = $bd->product;
                        @endphp
                        <td>{{ $bd->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $bd->quantity }}</td>
                        <td>{{ $bd->unit_price * $bd->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-2">
                    <select class="form-control m-bot15" id="status_bill_detail" idBill="@if (isset($bill)) {{ $bill->id }} @endif">
                        @if (isset($bill))
                            @if ($bill->active == 2)
                            <option value="2" @if ($bill->active == 2) {{ 'selected=""' }} @endif> {{ trans('messages.done') }} </option>
                            @else
                            <option class="del_option" value="0" @if ($bill->active == 0) {{ 'selected=""' }} @endif> Đang Chờ </option>
                            <option class="del_option" value="1" @if ($bill->active == 1) {{ 'selected=""' }} @endif> Xác Nhận </option>
                            <option value="2" @if ($bill->active == 2) {{ 'selected=""' }} @endif> {{ trans('messages.done') }}{{ trans('messages.done') }}{{ trans('messages.done') }} </option>
                            <option class="del_option" value="3" @if ($bill->active == 3) {{ 'selected=""' }} @endif> Hủy Bỏ </option>
                            @endif
                        @endif
                    </select>
                </div>
                @if ($bill->active != 2)
                <div class="col-sm-2 dlt">
                    <a id="button_update_status" class="btn btn-success"><i class="fa fa-refresh"></i> {{ trans('messages.update') }} </a>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <a class="btn btn-warning" href="{{ route('listbill')}}"><i class="glyphicon glyphicon-chevron-left"></i> {{ trans('messages.back') }} </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{ Html::script('js/admin/bill_detail.js')}}
@endsection
