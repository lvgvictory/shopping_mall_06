<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="col-md-3 footer-left">
            <h2><a href="index.html"><img src="site/images/logo3.jpg" alt=" " /></a></h2>
            <p>{{  trans('messages.text') }}
            </p>
        </div>
        <div class="col-md-9 footer-right">
            <div class="col-sm-6 newsleft">
                <h3>{{ trans('messages.SIGN_UP_FOR_NEWSLETTER') }}</h3>
            </div>
            <div class="col-sm-6 newsright">
                <form>
                    <input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    <input type="submit" value="{{ trans('messages.Submit') }}">
                </form>
            </div>
            <div class="clearfix"></div>
            <div class="sign-grds">
                <div class="col-md-4 sign-gd">
                    <h4>{{ trans('messages.Information') }}</h4>
                    <ul>
                        <li><a href="{{ route('home-page') }}">{{ trans('messages.Home') }}</a></li>
                        @if (isset($categories))
                            @foreach($categories as $category)
                                @php
                                    $sub = $category->subCategories->first();
                                @endphp
                                @if (isset($sub))
                                    <li><a href="{{ route('mens', $sub->id) }}"> {{ $category->name }} </li>
                                @endif
                            @endforeach
                        @endif
                        <li><a href="contact.html">{{ trans('messages.contact') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-4 sign-gd-two">
                    <h4>{{ trans('messages.Store_Information') }}</h4>
                    <ul>
                        <li>
                            <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                            {{ trans('messages.Address_1234k_Avenue_4th_block') }} 
                            <span>{{ trans('messages.Newyork_City')}}</span>
                        </li>
                        <li>
                            <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                            {{ trans('messages.Email') }} : <a href="mailto:info@example.com">{{ trans('messages.info@example.com') }}</a>
                        </li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>{{ trans('messages.Phone') }} : {{ trans('messages.SDT') }}</li>
                    </ul>
                </div>
                <div class="col-md-4 sign-gd flickr-post">
                    <h4>{{ trans('messages.Flickr_Posts') }}</h4>
                    <ul>
                        <li><a href="single.html"><img src="site/images/b15.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="site/images/b16.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="site/images/b17.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="site/images/b18.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="site/images/b15.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="site/images/b16.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="site/images/b17.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="site/images/b18.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="site/images/b15.jpg" alt=" " class="img-responsive" /></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <p class="copy-right">{{ trans('messages.source') }}<a href="http://w3layouts.com/">{{ trans('messages.source') }}</a></p>
    </div>
</div>
<!-- //footer -->
