$(document).ready(function($) {    
    $(window).scroll(function(){
        if ($(this).scrollTop() > 150){
            $(".header-bottom").addClass('fixNav')
        } else {
            $(".header-bottom").removeClass('fixNav')
        }}
    )
});

$(window).load(function() {
    $('#visual').pignoseLayerSlider({
        play    : '.btn-play',
        pause   : '.btn-pause',
        next    : '.btn-next',
        prev    : '.btn-prev'
    });
});
