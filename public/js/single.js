$(window).load(function() {
    $('.flexslider').flexslider({
	    animation: "slide",
	    controlNav: "thumbnails"
    });
});

$(document).ready(function () {
    $('.add_cart_button').click(function (e) {
        e.preventDefault();
        var item_price = $(this).parents().find('.item_price').text();
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
