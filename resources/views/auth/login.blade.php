<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>{{ trans('login.smartshop') }}</title>
      <meta name="description" content="Love Authority." />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{ asset('library/boostrap/css/bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('library/ionicons/css/ionicons.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/admin/style-login.css')}}" />
   </head>
   <body>
      <!--hero section-->
      <section class="hero">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-8 mx-auto">
                  <div class="card border-none">
                     <div class="card-body">
                        <div class="mt-2">
                           <img src="img/male.jpg" alt="Male" class="brand-logo mx-auto d-block img-fluid rounded-circle"/>
                        </div>
                        <p class="mt-4 text-white lead text-center">
                           {{ trans('login.sign_in') }}
                        </p>
                        <div class="mt-4">
                           <form method="POST" action="{{ route('login') }}">
                              {{ csrf_field() }}
                              @if (count($errors) > 0)
                                  <!-- Form Error List -->
                                 <div class="alert alert-danger">
                                      <strong>Whoops! Something went wrong!</strong>

                                      <br><br>

                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                 </div>
                              @endif
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                 <span class="fa fa-envelope-o" aria-hidden="true"></span>
                                 <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="{{ trans('login.input_email') }}">
                              </div>
                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                 <input type="password" name="password" class="form-control" id="password" value="" placeholder="{{ trans('login.input_password') }}">
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ trans('login.keep_login') }}
                                 </label>
                              </div>
                              <button type="submit" class="btn btn-primary float-right">{{ trans('login.login') }}</button>
                           </form>
                           <div class="clearfix"></div>
                           <p class="content-divider center mt-4"><span>{{ trans('login.or') }}</span></p>
                        </div>
                        <p class="mt-4 social-login text-center">
                           <a href="#" class="btn btn-twitter"><em class="ion-social-twitter"></em></a>
                           <a href="#" class="btn btn-facebook"><em class="ion-social-facebook"></em></a>
                           <a href="#" class="btn btn-linkedin"><em class="ion-social-linkedin"></em></a>
                           <a href="#" class="btn btn-google"><em class="ion-social-googleplus"></em></a>
                           <a href="#" class="btn btn-github"><em class="ion-social-github"></em></a>
                        </p>
                        <p class="text-center">
                           {{ trans('login.question_login') }} <a href="{{ route('register') }}">{{ trans('login.sign_up') }}</a>
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