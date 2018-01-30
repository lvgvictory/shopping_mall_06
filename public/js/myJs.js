$(document).ready(function($) {    
    $(window).scroll(function(){
        if ($(this).scrollTop() > 150){
            $(".header-bottom").addClass('fixNav')
        } else {
            $(".header-bottom").removeClass('fixNav')
        }
    });

    $('#keyword').keyup(function(e) {
        e.preventDefault();
        var keyword = $(this).val();
        if (keyword.length > 0) {
            $.ajax({
                url: '/search-product',
                type: 'GET',
                data: {keyword: keyword},
                success: function (res) {
                    var result = "";
                    for (var i = 0; i < res.length; i++) {
                        result += "<li><a href='/single/" + res[i].id + "'>" + res[i].name + "</a></li>";
                    }
                    $('.search_result').html(result);
                }
            });
        } else {
            $('.search_result').html('');
        }
    });
});

$(window).load(function() {
    $('#visual').pignoseLayerSlider({
        play    : '.btn-play',
        pause   : '.btn-pause',
        next    : '.btn-next',
        prev    : '.btn-prev'
    });
});
