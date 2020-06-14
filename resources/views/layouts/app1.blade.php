<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'OutplacementHeroes') }}</title>
    <!-- Scripts -->
    <script defer src="{{ asset('js/app.js') }}"></script>
    <!--modified here-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
          $( "#datepicker" ).datepicker();
        } );
    </script>
    <!--modified here-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app1.css') }}" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"><style type="text/css">
    .nav
    {
      background: #038cfc;
      width: 100%;
      height: 100px;
      position: relative;
      z-index: 1;
      width: 100%;
      min-height: 115px;
      background-position: bottom center;
      background-size: cover;
    }
    .logo img
    {
      float: left;
      margin-right: 50px;
      margin-left: 2%;
      margin-top: 2%;
    }
    .nav > .nav-header 
    {
      display: inlsine;
    }
    .nav > .nav-btn 
    {
      display: none;
    }
    .nav > .nav-links 
    {
      display: inline;
      margin-top: 2%;
      margin-left: 2%;
      background-color: transparent;
      float: right;
      font-weight: 600;
      font-size: 20px;
    }
    .nav > .nav-links > a 
    {
      display: inline-block;
      padding: 10px 10px 10px 10px;
      text-decoration: none;
      color: white;
      background-color: rgba(0,0,0,0);
      border-radius: 5px;
    }
    .nav > .nav-links > .active
    {
      border-bottom: 2px solid #f51653;
      border-bottom-right-radius: 0px;
      border-bottom-left-radius: 0px;
    }
    .nav > .nav-links > a:hover 
    {
      border-bottom: 2px solid #f51653;
      border-bottom-right-radius: 0px;
      border-bottom-left-radius: 0px;
    }
    .nav > #nav-check 
    {
      display: none;
    }
    @media (max-width:900px) 
    {
      .nav
      {
        min-height: 200px;
      }
      .nav > .nav-btn 
      {
        display: inline-block;
        position: absolute;
        right: 0px;
        top: 0px;
      }
      .nav > .nav-btn > label 
      {
        display: inline-block;
        width: 50px;
        height: 50px;
        padding: 13px;
        right: 0px;
        top: 0px;
      }
      .nav > .nav-btn > label:hover,.nav  #nav-check:checked ~ .nav-btn > label 
      {
        background-color: rgba(0, 0, 0, 0);
      }
      .nav > .nav-btn > label > span 
      {
        right: 0;
        display: block;
        width: 30px;
        height: 10px;
        border-top: 4px solid white;
      }
      .nav > .nav-links 
      {
        position: absolute;
        display: inline-block;
        width: 100%;
        background-color: white;
        height: 0px;
        transition: all 0.3s ease-in;
        overflow-y: hidden;
        top: 40px;
        left: 0px;
      }
      .nav > .nav-links > a 
      {
        display: block;
        width: 100%;
        color: black;
      }
      .nav > #nav-check:not(:checked) ~ .nav-links 
      {
        height: 0px;
      }
      .nav > #nav-check:checked ~ .nav-links 
      {
        height: calc(100vh - 50px);
        overflow-y: auto;
      }
      .logo img
      {
        width: 300px;
        height: 100px;
        margin-left: 1%;
      }
      button
      {
        display: none;
      }
    }
  </style>
    <!--modified here-->
</head>
<body>
    <div id="app">
<div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
      <a class="logo" href="/">
        <img src="{{ asset('HomeImages/Logo.jpeg') }}" width="240px" height="100px">
      </a>
    </div>
    <div class="nav-btn">
      <label for="nav-check">
        <span></span>
        <span></span>
        <span></span>
      </label>
    </div>
    <section>
      <div class="wave">
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
      </div>
    </section>
      @guest
        @if (Route::has('register'))
          <!--li class="nav-links">
            <a href="{{ route('register') }}">Job Seeker</a>
          </li-->
        @endif
          <li class="nav-links">
            <a href="{{ route('employer.register') }}">{{ __('Hiring Employer') }}</a>
          </li>
          <li class="nav-links">
            <a href="{{ route('consultant.register') }}">{{ __('Consultant') }}</a>
          </li>
          <li class="nav-links">
            <a href="{{ route('volunteer.register') }}">{{ __('Volunteer(Mentor)') }}</a>
          </li>
          <li class="nav-links">
            <a href="{{ route('jvolunteer.register') }}">{{ __('Volunteer(Job Support)') }}</a>
          </li>
          <li class="nav-links">
            <a href="{{ route('semployer.register') }}">{{ __('Separating Company') }}</a>
          </li>
        @else
          @if(Auth::user()->user_type=='employer')
            <li class="nav-item"><a href="{{route('job.create')}}" class="nav-link">Post a job</a></li>           
            @endif
            
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    
                                                    
                    @if(Auth::user()->user_type=='employer')
                    {{Auth::user()->company->cname}}                        
                    
                    @elseif(Auth::user()->user_type=='seeker')
                    {{Auth::user()->name}}

                    @elseif(Auth::user()->user_type=='volunteer')
                    {{Auth::user()->name}}

                    @elseif(Auth::user()->user_type=='jvolunteer')
                    {{Auth::user()->name}}

                    @else  
                            {{Auth::user()->name}}  
                    @endif
        
                    <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                
                    @if(Auth::user()->user_type=='employer')
                        <a class="dropdown-item" href="{{route('company.index',[Auth::user()->company->id,Auth::user()->company->slug])}}"
                        >
                            {{ __('My Company') }}
                        </a>   
                    @elseif(Auth::user()->user_type=='seeker')

                        <a class="dropdown-item" href="{{route('user.show',[Auth::user()->id])}}"
                        >
                            {{ __('Profile') }}
                        </a>

                        @elseif(Auth::user()->user_type=='volunteer')

                        <a class="dropdown-item" href="{{route('volunteer.show',[Auth::user()->id])}}"
                        >
                            {{ __('Profile') }}
                        </a>

                        <a class="dropdown-item" href="{{route('vseeker.index')}}"
                        >
                            {{ __('Dashboard') }}
                        </a>

                        @elseif(Auth::user()->user_type=='jvolunteer')

                        <a class="dropdown-item" href="{{route('jvolunteer.show',[Auth::user()->id])}}"
                        >
                            {{ __('Profile') }}
                        </a>

                        <a class="dropdown-item" href="{{route('jvseeker.index')}}"
                        >
                            {{ __('Dashboard') }}
                        </a>

                        @else

                        <a class="dropdown-item" href="/dashboard"
                        >
                            {{ __('Dashboard') }}
                        </a>
                        
                    @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
            </li>
        @endguest
      </ul>
    </div>
  </div>
        <!--nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent"-->
                    <!-- Left Side Of Navbar -->
                    <!--div class="nav-header">
                      <a class="logo" href="/">
                        <img src="{{ asset('HomeImages/Logo.jpeg') }}" width="240px" height="100px">
                      </a>
                    </div-->
                    <!-- Right Side Of Navbar -->
                    <!--ul class="navbar-nav ml-auto--">
                        <!- Authentication Links -->
                        @guest
                            <!--li class="nav-item">
                                <a style="color: white;" class="nav-link" href="{{ route('employer.register') }}">{{ __('Employer Register') }}</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a style="color: white;" class="nav-link" href="{{ route('register') }}">{{ __('Job Seeker Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    
                                                                       
                                    @if(Auth::user()->user_type=='employer')
                                    {{Auth::user()->company->cname}}
                                    
                                
                                    @elseif(Auth::user()->user_type=='seeker')
                                        {{Auth::user()->name}}
                                        @else
                                        {{Auth::user()->name}}
                                    @endif
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->user_type=='employer')
                                    <a class="dropdown-item" href="{{ route('company.view') }}">
                                        {{ __('Company') }}
                                    </a>
                                @elseif(Auth::user()->user_type=='seeker')
                                    <a class="dropdown-item" href="{{route('user.profile')}}">
                                        {{ __('Profile') }}
                                    </a>
                                    @else
                                 @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav-->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>