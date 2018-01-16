<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>SmartShop</title>
      <meta name="description" content="Love Authority." />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{ asset('library/boostrap/css/bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('library/ionicons/css/ionicons.min.css') }}" />
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/admin/style-login.css')}}" />
   </head>
   <body>
      <!--hero section-->
      <section class="hero">
         <div class="container">
            <div class="row register">
               <div class="col-md-6 col-sm-8 mx-auto">
                  <div class="card border-none">
                     <div class="card-body">
                        <div class="mt-2">
                           <img src="img/male.jpg" alt="Male" class="brand-logo mx-auto d-block img-fluid rounded-circle"/>
                        </div>
                        <p class="mt-4 text-white lead text-center">
                           Register new Member
                        </p>
                        <div class="mt-4">
                           <form method="POST" action="{{ route('register') }}">
                              {{ csrf_field() }}
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                 <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Fullname">
                                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                 @endif
                              </div>
                              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                 <input type="text" class="form-control" id="address" name="address" value="" placeholder="Address">
                                 @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                 @endif
                              </div>
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                 <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email address">
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                 @endif
                              </div>
                              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                 <input type="text" class="form-control" id="phone" name="phone" value="" placeholder="Your telephone">
                                 @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                 @endif
                              </div>
                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                 <input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter password">
                                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <input type="password" class="form-control" id="password-confirm" value="" placeholder="Password confirm" name="password_confirmation">
                              </div>
                              <button type="submit" class="btn btn-primary float-right">Sign in</button>
                           </form>
                           <div class="clearfix"></div>
                           <p class="content-divider center mt-4"><span>or</span></p>
                        </div>
                        <p class="mt-4 social-login text-center">
                           <a href="#" class="btn btn-twitter"><em class="ion-social-twitter"></em></a>
                           <a href="#" class="btn btn-facebook"><em class="ion-social-facebook"></em></a>
                           <a href="#" class="btn btn-linkedin"><em class="ion-social-linkedin"></em></a>
                           <a href="#" class="btn btn-google"><em class="ion-social-googleplus"></em></a>
                           <a href="#" class="btn btn-github"><em class="ion-social-github"></em></a>
                        </p>
                        <p class="text-center">
                           Welcome SmartShop! <a href="{{ route('login') }}">Login Now</a>
                        </p>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
      </section>
   </body>
</html>
