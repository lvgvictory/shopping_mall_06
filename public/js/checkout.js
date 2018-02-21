$(document).ready(function(c) {
    $('.close1').on('click', function(c){
        $('.rem1').fadeOut('slow', function(c){
            $('.rem1').remove();
        });
    });   
});

$(document).ready(function(c) {
    $('.close2').on('click', function(c){
        $('.rem2').fadeOut('slow', function(c){
            $('.rem2').remove();
        });
    });   
});

$(document).ready(function(c) {
    $('.close3').on('click', function(c){
        $('.rem3').fadeOut('slow', function(c){
            $('.rem3').remove();
        });
    });   
});

$(document).ready(function(c) {
    $('.close4').on('click', function(c){
        $('.rem4').fadeOut('slow', function(c){
            $('.rem4').remove();
        });
    });   
});

// quantity
$('.value-plus').on('click', function(){
    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
    divUpd.text(newVal);
});

$('.value-minus').on('click', function(){
    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
    if (newVal>=1) divUpd.text(newVal);
});
// quantity

$(document).ready(function () {
    
    function getCart() {
        $.ajax({
            url: '/get-cart',
            type: 'GET',
            success: function (res) {
                $('.home_cart_total').html(res.total);
                $('.home_count_cart').html(res.count_cart);
                $('.total_price').html('Thành Tiền:' + ' ' + res.total + ' ' +'vnd');
            }
        });
    }

    getCart();

    $('.delete-product').click(function (e) {
        e.preventDefault();
        var idCart = $(this).attr('idCart');
        var deleteProduct = $(this);
        $.ajax({
            url: '/del-cart',
            type: 'GET',
            data: {idCart: idCart},
            success: function (res) {
                if (res == 1) {
                    deleteProduct.parents('.rem1').remove();
                    getCart();
                    toastr.warning('Product was removed!');
                }
            }
        });
    });

    $('.qualyti_product').click(function (e) {
        e.preventDefault();
        var qualyti_product = $(this);
        var rowID = $(this).attr('idCart');
        var qty = $(this).parent().find('.soluong').text();
        console.log(rowID);

        $.ajax({
            url: '/update-cart',
            type: 'GET',
            data: {quantity: qty, rowID: rowID},
            success: function (res) {
                $.each( res, function( key, value ) {
                    let total_price = value.price * value.qty;
                    qualyti_product.parents('.rem1').find('.item_price').html(value.price + ' ' + ' vnd');
                    qualyti_product.parents('.rem1').find('.item_total_price').html(total_price + ' ' + ' vnd');
                });
                getCart();
                toastr.success('Product Successfully!');
            }
        });
    });

    $('#check_mail').blur(function() {
        var check_mail = $(this).val();
        $.ajax({
            url: '/check-email',
            type: 'GET',
            data: {check_mail: check_mail},
            success: function ($res) {
                if ($res) {
                    let str = "Email đã tồn tại vui lòng đăng nhập <a href='/login'> Đăng Nhập </a>";
                    $('.result_email').html(str);
                    $('.result_email').css('color', 'pink');
                } else {
                    let str = 'Email hợp lệ';
                    $('.result_email').html(str);
                    $('.result_email').css('color', 'green');
                }
            }
        });
    });
});
