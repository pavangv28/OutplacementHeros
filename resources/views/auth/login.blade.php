@extends('layouts.app1')
<head>
    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('HomeImages/Favicon.png') }}">
    <style type="text/css">
    form:after 
    {
      content: ".";
      display: block;
      height: 0;
      clear: both;
      visibility: hidden;
    }
    .container 
    {
      margin: 25px auto;
      position: relative;
      width: 900px;
    }
    #content 
    {
      background: #f9f9f9;
      background: -moz-linear-gradient(top, rgba(248, 248, 248, 1) 0%, rgba(249, 249, 249, 1) 100%);
      background: -webkit-linear-gradient(top, rgba(248, 248, 248, 1) 0%, rgba(249, 249, 249, 1) 100%);
      background: -o-linear-gradient(top, rgba(248, 248, 248, 1) 0%, rgba(249, 249, 249, 1) 100%);
      background: -ms-linear-gradient(top, rgba(248, 248, 248, 1) 0%, rgba(249, 249, 249, 1) 100%);
      background: linear-gradient(top, rgba(248, 248, 248, 1) 0%, rgba(249, 249, 249, 1) 100%);
      filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#f8f8f8', endColorstr='#f9f9f9', GradientType=0);
      -webkit-box-shadow: 0 1px 0 #fff inset;
      -moz-box-shadow: 0 1px 0 #fff inset;
      -ms-box-shadow: 0 1px 0 #fff inset;
      -o-box-shadow: 0 1px 0 #fff inset;
      box-shadow: 0 1px 0 #fff inset;
      border: 1px solid #c4c6ca;
      margin: 0 auto;
      padding: 25px 0 0;
      position: relative;
      text-align: center;
      text-shadow: 0 1px 0 #fff;
      width: 400px;
    }
    #content h1 
    {
      color: #7E7E7E;
      font: bold 25px Helvetica, Arial, sans-serif;
      letter-spacing: -0.05em;
      line-height: 20px;
      margin: 10px 0 30px;
    }
    #content h1:before,#content h1:after 
    {
      content: "";
      height: 1px;
      position: absolute;
      top: 10px;
      width: 27%;
    }
    #content h1:after 
    {
      background: rgb(126, 126, 126);
      background: -moz-linear-gradient(left, rgba(126, 126, 126, 1) 0%, rgba(255, 255, 255, 1) 100%);
      background: -webkit-linear-gradient(left, rgba(126, 126, 126, 1) 0%, rgba(255, 255, 255, 1) 100%);
      background: -o-linear-gradient(left, rgba(126, 126, 126, 1) 0%, rgba(255, 255, 255, 1) 100%);
      background: -ms-linear-gradient(left, rgba(126, 126, 126, 1) 0%, rgba(255, 255, 255, 1) 100%);
      background: linear-gradient(left, rgba(126, 126, 126, 1) 0%, rgba(255, 255, 255, 1) 100%);
      right: 0;
    }
    #content h1:before 
    {
      background: rgb(126, 126, 126);
      background: -moz-linear-gradient(right, rgba(126, 126, 126, 1) 0%, rgba(255, 255, 255, 1) 100%);
      background: -webkit-linear-gradient(right, rgba(126, 126, 126, 1) 0%, rgba(255, 255, 255, 1) 100%);
      background: -o-linear-gradient(right, rgba(126, 126, 126, 1) 0%, rgba(255, 255, 255, 1) 100%);
      background: -ms-linear-gradient(right, rgba(126, 126, 126, 1) 0%, rgba(255, 255, 255, 1) 100%);
      background: linear-gradient(right, rgba(126, 126, 126, 1) 0%, rgba(255, 255, 255, 1) 100%);
      left: 0;
    }
    #content:after,#content:before 
    {
      background: #f9f9f9;
      background: -moz-linear-gradient(top, rgba(248, 248, 248, 1) 0%, rgba(249, 249, 249, 1) 100%);
      background: -webkit-linear-gradient(top, rgba(248, 248, 248, 1) 0%, rgba(249, 249, 249, 1) 100%);
      background: -o-linear-gradient(top, rgba(248, 248, 248, 1) 0%, rgba(249, 249, 249, 1) 100%);
      background: -ms-linear-gradient(top, rgba(248, 248, 248, 1) 0%, rgba(249, 249, 249, 1) 100%);
      background: linear-gradient(top, rgba(248, 248, 248, 1) 0%, rgba(249, 249, 249, 1) 100%);
      filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#f8f8f8', endColorstr='#f9f9f9', GradientType=0);
      border: 1px solid #c4c6ca;
      content: "";
      display: block;
      height: 100%;
      left: -1px;
      position: absolute;
      width: 100%;
    }
    #content:after 
    {
      -webkit-transform: rotate(2deg);
      -moz-transform: rotate(2deg);
      -ms-transform: rotate(2deg);
      -o-transform: rotate(2deg);
      transform: rotate(2deg);
      top: 0;
      z-index: -1;
    }
    #content:before 
    {
      -webkit-transform: rotate(-3deg);
      -moz-transform: rotate(-3deg);
      -ms-transform: rotate(-3deg);
      -o-transform: rotate(-3deg);
      transform: rotate(-3deg);
      top: 0;
      z-index: -2;
    }
    #content form 
    {
      margin: 20px 20px;
      position: relative
    }
    #content form input[type="email"],#content form input[type="password"] 
    {
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      -ms-border-radius: 3px;
      -o-border-radius: 3px;
      border-radius: 3px;
      -webkit-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
      -moz-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
      -ms-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
      -o-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
      box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -ms-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      transition: all 0.5s ease;
      background: #eae7e7 url(https://cssdeck.com/uploads/media/items/8/8bcLQqF.png) no-repeat;
      border: 1px solid #c8c8c8;
      color: #777;
      font: 13px Helvetica, Arial, sans-serif;
      margin: 0 0 10px;
      padding: 20px 15px 20px 45px;
      width: 80%;
    }
    #content form input[type="email"]:focus,#content form input[type="password"]:focus 
    {
      -webkit-box-shadow: 0 0 2px #ed1c24 inset;
      -moz-box-shadow: 0 0 2px #ed1c24 inset;
      -ms-box-shadow: 0 0 2px #ed1c24 inset;
      -o-box-shadow: 0 0 2px #ed1c24 inset;
      box-shadow: 0 0 2px #ed1c24 inset;
      background-color: #fff;
      border: 1px solid #f51653;
      outline: none;
    }
    #email
    {
      background-position: 10px 10px !important
    }
    #password 
    {
      background-position: 10px -53px !important
    }
    #content form input[type="submit"] 
    {
      background: #f51653;
      border-radius: 10px;
      border: 2px solid white;      
      color: white;
      font-size: 15px;
      width: 100px; 
      font-weight: 900;
      transition: all 0.3s ease 0s;
      cursor: pointer;
      float: left;
      height: 40px;
      margin: 20px 0 35px 15px;
      position: relative;
    }
    #content form input[type="submit"]:hover 
    {
      border-radius: 30px 5px;
    }
    #content form div a 
    {
      color: #004a80;
      float: right;
      font-size: 12px;
      margin: 30px 15px 0 0;
      text-decoration: underline;
    }
    .button 
    {
      background: rgb(247, 249, 250);
      background: -moz-linear-gradient(top, rgba(247, 249, 250, 1) 0%, rgba(240, 240, 240, 1) 100%);
      background: -webkit-linear-gradient(top, rgba(247, 249, 250, 1) 0%, rgba(240, 240, 240, 1) 100%);
      background: -o-linear-gradient(top, rgba(247, 249, 250, 1) 0%, rgba(240, 240, 240, 1) 100%);
      background: -ms-linear-gradient(top, rgba(247, 249, 250, 1) 0%, rgba(240, 240, 240, 1) 100%);
      background: linear-gradient(top, rgba(247, 249, 250, 1) 0%, rgba(240, 240, 240, 1) 100%);
      filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#f7f9fa', endColorstr='#f0f0f0', GradientType=0);
      -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
      -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
      -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
      -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
      -webkit-border-radius: 0 0 5px 5px;
      -moz-border-radius: 0 0 5px 5px;
      -o-border-radius: 0 0 5px 5px;
      -ms-border-radius: 0 0 5px 5px;
      border-radius: 0 0 5px 5px;
      border-top: 1px solid #CFD5D9;
      padding: 15px 0;
    }
    .button a 
    {
      background: url(https://cssdeck.com/uploads/media/items/8/8bcLQqF.png) 0 -112px no-repeat;
      color: #7E7E7E;
      font-size: 17px;
      padding: 2px 0 2px 40px;
      text-decoration: none;
      -webkit-transition: all 0.3s ease;
      -moz-transition: all 0.3s ease;
      -ms-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      transition: all 0.3s ease;
    }
    .button a:hover 
    {
      background-position: 0 -135px;
      color: #00aeef;
    }
    @media (max-width:900px)
    {
      #content
      {
        width: 300px;
      }

    }
    </style>
</head>
<body>
    @section('content')
    <div class="container">
      <section id="content">
        @if(Session::has('message'))
          <div class="alert alert-success">
            {{Session::get('message')}}
          </div>    
        @endif
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <h1>LOGIN</h1>
          <center><div>
            <input id="email" placeholder="Email ID" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required="" autocomplete="email" />
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div>
            <input type="password" placeholder="Password" required="" id="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div></center>
          <div>
          <label style="margin-left: -40%;" for="remember" class="checkbox">              
            <input value="remember-me" id="remember" name="rememberMe" class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }}>Remember me
          </label>
        </div>
        <div>
          <input type="submit" value="Login" />
        </div>
        <p style="margin-top: 5%;">
          @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
            </a>
          @endif
        </p>
      </form>
    </section>
  </div>
<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            
            @endif
            
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div-->
@endsection
</body>