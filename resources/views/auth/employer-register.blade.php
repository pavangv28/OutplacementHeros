<head>
  <title>Employer Signup</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('HomeImages/Favicon.png') }}">
  <style type="text/css">
    .text
    {
      font-weight: 600;
      background-color: white;
      margin-top:-10%;
      
      font-size:30px;
    }
    form input[type=submit]
    {
      background: #038CFC;
      border-radius: 30px 5px;
      border: 2px solid white;      
      color: white;
      font-size: 15px;
      width: 100px; 
      font-weight: 900;
      transition: all 0.3s ease 0s;
      cursor: pointer;
      float: left;
      height: 40px;
      margin-left: 25%;
      margin-top: 15%;
      position: relative;
    }
    form input[type="submit"]:hover 
    {
        border-radius:5px 30px;
         color:white;
    }
    form
    {
      border: 2px solid #038cfc;
    }
    .txt
    {
      font-size: 15px;
      border-bottom: 2px solid grey;
      border-right: 2px solid grey;
      opacity: 0.5;
      width: 250px;
      height: 35px;
      border-radius: 10px;
    }
    @media (max-width:900px) 
    {
      .ftco-section .container .row
      {
        margin-left: -140%;
      }
      .text
      {
        font-size: 30px;
      }
      form p
        {
          margin-left: -130%;
        }
      form
      {
        border: none;
      }
    }
  </style>
</head>
<body>
@extends('layouts.main1')
@section('content')
<div class="hero-wrap" style="height: 0px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3">
                <a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> 
                <span>Sign Up</span></p>
                <h1 style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hiring Employer </h1>
            </div>
        </div>
    </div>
</div>

<div class="ftco-section bg-light">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
        <div class="text-center"><h1 class="text">Hiring Employer Signup</h1></div>
        </div>
        </div>
        <div class="row" style="margin-left: 32%;color: black;font-size: 14px;margin-bottom: -10%;margin-top: -5%;">
            @if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
           
            <div class="col-md-12 col-lg-6 mb-5">
            <form method="POST" action="{{ route('emp.register') }}" class="p-5 bg-white">
                @csrf
                <input type="hidden" value="employer" name="user_type">
                <div class="form-group row" style="margin-top: -10%;">
                    <div class="col-md-12">Company Name</div>
                    <div class="col-md-12">
                        <input class="txt" id="name" type="text" class="form-control{{ $errors->has('cname') ? ' is-invalid' : '' }}" name="cname" value="{{ old('cname') }}" required>

                        @if ($errors->has('cname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
            
                    <div class="col-md-12">Your Name</div>

                    <div class="col-md-12">
                        <input class="txt" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
            
                    <div class="col-md-12">Email</div>

                    <div class="col-md-12">
                        <input class="txt" id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                


                <div class="form-group row">
            
                    <div class="col-md-12">Password</div>

                    <div class="col-md-12">
                        <input class="txt" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 10%;">
                    <div class="col-md-12">Confirm password</div>

                    <div class="col-md-12">
                        <input class="txt" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
      <div class="row form-group" style="margin-top: -17%;margin-bottom: 0px;">
        <div class="col-md-12">
          <input value="Register" type="submit" class="buttonr py-1 px-3">
        </div>
      </div>

      <p style="font-size: 13px;margin-bottom: -17%;">*Verification link will be sent to your email.</p>
    </form>      
    </div>
    </div>

        </div>
    </div>

    @endsection
  </body>