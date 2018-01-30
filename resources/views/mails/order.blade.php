{{ trans('messages.hello') }} : {{ $name }} <br/>
{{ trans('messages.address')}} : {{ $address }} <br/>
{{ trans('messages.phone') }} : {{ $mobile}} <br/>
{{ trans('messages.Email') }} : {{ $email }} <br/>
<p>{{ trans('messages.thankcustomer') }}!</p>
<br/>
<p>{{ trans('messages.order1') }}</p>
@foreach( $Cart as $item)
+{{ trans('messages.nameproduct') }}: {{ $item->name }} <br/>
+{{ trans('messages.qty') }} : {{ $item->qty}} <br/>
-----------------------------------------<br/>
@endforeach
{{ trans('messages.Total') }} : {{ $total }} <br/>
----------------------------------------<br/>
{{ trans('messages.totalpro') }} {{ $count }}