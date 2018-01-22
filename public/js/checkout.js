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

    $('.entry').click(function (e) {
        e.preventDefault();
        var qty = $(this).parent().find('.value').text();
        var rowID = $('.delete-product').attr('idCart');

        $.ajax({
            url: '/update-cart',
            type: 'GET',
            data: {quantity: qty, rowID: rowID},
            success: function (res) {
                $.each( res.data, function( key, value ) {
                    let total_price = value.price * value.qty;
                    $('.item_price').html(value.price + ' ' + ' vnd');
                    $('.item_total_price').html(total_price + ' ' + ' vnd');
                });
                getCart();
                toastr.success('Product Successfully!');
            }
        });
    });
});
