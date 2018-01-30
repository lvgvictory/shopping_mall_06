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
                <a class="btn btn-danger" href="{{ route('deletebill', $bill->id) }}"  onclick="return confirm('Bạn có chắc là muốn xóa?')"><i class="fa fa-trash-o"></i> {{ trans('messages.Remove') }} </a>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>