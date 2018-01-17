<!-- banner -->
<div class="banner-grid">
    <div id="visual">
        <div class="slide-visual">
            <!-- Slide Image Area (1000 x 424) -->
            <ul class="slide-group">
                @foreach($slides as $slide)
                    <li><img class="img-responsive" src="site/images/{{ $slide['image'] }}" alt="Dummy Image" /></li>
                @endforeach
            </ul>
            <!-- Slide Description Image Area (316 x 328) -->
            <div class="script-wrap">
                <ul class="script-group">
                    @foreach($slides1 as $slide)
                        <li>
                            <div class="inner-script"><img class="img-responsive" src="site/images/{{ $slide['image'] }}" alt="Dummy Image" /></div>
                        </li>
                    @endforeach
                </ul>
                <div class="slide-controller">
                    <a href="#" class="btn-prev"><img src="site/images/btn_prev.png" alt="Prev Slide" /></a>
                    <a href="#" class="btn-play"><img src="site/images/btn_play.png" alt="Start Slide" /></a>
                    <a href="#" class="btn-pause"><img src="site/images/btn_pause.png" alt="Pause Slide" /></a>
                    <a href="#" class="btn-next"><img src="site/images/btn_next.png" alt="Next Slide" /></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <script type="text/javascript" src="library/bower_site/pignose.layerslider.js"></script>
</div>
<!-- //banner -->
