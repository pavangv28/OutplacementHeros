<head>
  <style type="text/css">
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
      display: inline;
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
      font-size: 23px;
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
        display: none;
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
    .button
    {
      border-radius: 30px 5px;
      margin-left: 10%;
      margin-top: 20%;
      border: 2px solid white;
      display: block;
      font-weight: 900;
      font-size:18px;
      position: relative;
      transition:0.3s ease-in-out all;
      padding: 5px 5px 5px 5px;
      transform-origin:50% 0;
      background-color: #f51653;
      color: white;
      width: 150px;
    }
    .button:hover
    {
      border-radius: 5px 30px;
      border: 2px solid black;
      background-color: white;
      color: black;
    }
  </style>
</head>
<body>
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
            <a href="{{ route('volunteer.register') }}">{{ __('Mentor') }}</a>
          </li>
          <li class="nav-links">
            <a href="{{ route('jvolunteer.register') }}">{{ __('Mentor(Job Support)') }}</a>
          </li>
          <li class="nav-links">
            <a href="{{ route('semployer.register') }}">{{ __('Separating Employer') }}</a>
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
  <!-- Modal -->
  <div class="modal fade" id="ophLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('login') }}">@csrf
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
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
                <div class="col-md-6 offset-md-4">
                  @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  @endif
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>