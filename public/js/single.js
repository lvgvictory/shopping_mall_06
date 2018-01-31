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

    $('.rate_point').click(function() {
        var rate_point = $(this).val();
        var id_user = $(this).attr('idUser');
        var id_product = $(this).attr('idProduct');

        if (id_user) {
            $.ajax({
                url: '/rate-point',
                type: 'GET',
                data: {rate_point: rate_point, id_user: id_user, id_product: id_product},
                success: function (res) {
                    var rate = res.rating.toFixed(2)
                    var str = rate + "/5" + " (" + res.count + " Lượt)";
                    $('.result_rate').html(str);
                    toastr.success('Cám ơn bạn đã đánh giá');
                }
            });
        }
        else {
            toastr.warning('Bạn cần phải đăng nhập trước khi đánh giá');
        }
        
    });
});
