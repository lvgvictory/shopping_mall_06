@extends('layouts.master')
@section('content')
<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3>Check Out</h3>
    </div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
    <div class="container">
        <h3>My Shopping Bag</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tr class="rem1">
                    <td class="invert-closeb">
                        <div class="rem">
                            <div class="close1"> </div>
                        </div>
                    </td>
                    <td class="invert-image"><a href="single.html"><img src="site/images/w4.png" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">Hand Bag</td>
                    <td class="invert">$45.99</td>
                </tr>
                <tr class="rem2">
                    <td class="invert-closeb">
                        <div class="rem">
                            <div class="close2"> </div>
                        </div>
                    </td>
                    <td class="invert-image"><a href="single.html"><img src="site/images/ep3.png" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">Watches</td>
                    <td class="invert">$45.99</td>
                </tr>
                <tr class="rem3">
                    <td class="invert-closeb">
                        <div class="rem">
                            <div class="close3"> </div>
                        </div>
                    </td>
                    <td class="invert-image"><a href="single.html"><img src="site/images/w2.png" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">Sandals</td>
                    <td class="invert">$45.99</td>
                </tr>
                <tr class="rem4">
                    <td class="invert-closeb">
                        <div class="rem">
                            <div class="close4"> </div>
                        </div>
                    </td>
                    <td class="invert-image"><a href="single.html"><img src="site/images/w1.png" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">Wedges</td>
                    <td class="invert">$45.99</td>
                </tr>
            </table>
        </div>
        <div class="checkout-left">
            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="mens.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
            </div>
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>Shopping basket</h4>
                <ul>
                    <li>Hand Bag <i>-</i> <span>$45.99</span></li>
                    <li>Watches <i>-</i> <span>$45.99</span></li>
                    <li>Sandals <i>-</i> <span>$45.99</span></li>
                    <li>Wedges <i>-</i> <span>$45.99</span></li>
                    <li>Total <i>-</i> <span>$183.96</span></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //check out -->
@endsection
@section('script')
{{ Html::script('js/checkout.js') }}
@endsection
