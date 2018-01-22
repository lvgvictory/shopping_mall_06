$(window).load(function(){
    $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 9000,
            values: [ 1000, 7000 ],
            slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });

    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

});

$(function () {
    $("#slider3").responsiveSlides({
        auto: true,
        pager: true,
        nav: false,
        speed: 500,
        namespace: "callbacks",
        before: function () {
            $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
            $('.events').append("<li>after event fired.</li>");
        }
    });
});

$(document).ready(function () {
    $('.add_cart_button').click(function (e) {
        e.preventDefault();
        var item_price = $(this).parent().find('.item_price').text();
        var item_id = $(this).attr('itemID');
        $.ajax({
            url: '/add-cart',
            type: 'GET',
            data: {item_price: item_price, item_id: item_id},
            success: function (res) {
                $('.home_cart_total').html(res.total);
                $('.home_count_cart').html(res.count_cart);
                toastr.success('Product Successfully!');
            }
        });
    });

    $.ajax({
        url: '/get-cart',
        type: 'GET',
        success: function (res) {
                $('.home_cart_total').html(res.total);
                $('.home_count_cart').html(res.count_cart);
            }
    });
});

