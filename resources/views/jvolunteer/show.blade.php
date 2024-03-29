@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 200px; background:#038cfc">
  <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="{{route('company')}}">Companies <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                <h1 style="font-size: 30px;margin-top:-28%;color:white;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Job-Search Support Volunteer: {{$user->name}}</h1>
            </div>
            <div class="col-md-3 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
               @if(Auth::check()&&Auth::user()->id==$user->id)
                  {{--<a href="{{route('company.view')}}"><button class="btn btn-danger btn-lg">Edit</button></a>--}}

                  <a class="btn edit btn-lg" style="background:#0c127d;font-size:18px;border-radius:10px;color:white;margin-top:-80%;" href="{{route('jvolunteer.profile')}}" role="button">Edit Details</a>

               @endif
            </div>
        </div>
  </div>
</div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          
            <div class="col-md-4  px-4 sidebar ftco-animate">
                
                    <div class="blog-entry align-self-stretch">
                         @if(empty($user->jvprofile->profile_pic))
                        <img  class="block-20" src="{{asset('profile_pic/man.jpg')}}">
                        @else
                        <img  class="block-20" src="{{asset('uploads/profile_pic')}}/{{$user->jvprofile->profile_pic}}">

                        @endif
                      
                        <div class="text mt-3">

                        @if(empty($user->jvprofile->profile_pic)&&Auth::check()&&Auth::user()->id==$user->id)
                              <p style="color: rgb(236, 32, 32); font-weight: bold; font-size: 18px;">Please upload your profile picture</p>
                        @endif

                        <h3 class="heading"><strong>Gender:</strong>&nbsp; &nbsp; {{$user->jvprofile->gender}}</h3>
                        <h3 class="heading"><strong>Date of Birth:</strong> &nbsp; &nbsp; {{$user->jvprofile->dob}}</h3>
                        <div class="meta mb-2">
                          <div>Member since: &nbsp; &nbsp; {{date('F d Y',strtotime($user->created_at))}}</div> 
                        
                      </div>

                        <div class="card mr-4">
                          <div class="card-header">
                              <a class="card-title">
                                 <h5 class="d-inline-block h5 text-dark font-weight-bold mb-0">Skills</h5>
                              </a>
                          </div>
                          <div class="card-body">
                            @foreach($user->skills as $skill)
                             <button type="button" class="btn btn-sm btn-info mt-1">{{$skill->skill}}</button>
                            @endforeach
              
                          </div>
                        </div>
                      
                    </div>
                    </div>
                  
            </div>

        <div class="col-md-8 px-4 ftco-animate">

        <h5 class="mb-2 mt-2">Email:</h5>
        <p>{{$user->email}}</p>

        <h5 class="mb-2 mt-2">Phone:</h5>
        <p>{{$user->jvprofile->phone}}</p>

        <h5 class="mb-2 mt-2">Address:</h5>
        <p>{{$user->jvprofile->address_line1}},
          {{$user->jvprofile->address_line2}}<br>
          {{$user->jvprofile->city}},&nbsp;{{$user->jvprofile->state}},
          Pincode:&nbsp; {{$user->jvprofile->pincode}}</p>

        <h5 class="mb-2 mt-2">Qualification:</h5>
        <p>{{$user->jvprofile->qualification}}</p>

        @if(!empty($user->jvprofile->industry))
        <h5 class="mb-2 mt-2">Industry:</h5>
        <p>{{$user->jvprofile->industry}}</p>
        @endif
        
        @if(!empty($user->jvprofile->designation))
        <h5 class="mb-2 mt-2">Designation:</h5>
        <p>{{$user->jvprofile->designation}}</p>
        @endif

        {{--<h5 class="mb-2 mt-2">Function:</h5>
        <p>{{$user->jvprofile->function}}</p>
        
        
            
                        <h3 class="heading"><strong>Email:</strong>&nbsp; &nbsp; {{$user->email}}</h3>
                        <h3 class="heading"><strong>Phone:</strong>&nbsp; &nbsp; {{$user->jvprofile->phone}}</h3>
                        <h3 class="heading"><strong>Address:</strong></strong> &nbsp; &nbsp;</h3>
                        <p><h5 class="heading">{{$user->jvprofile->address_line1}}
                        {{$user->jvprofile->address_line2}},
                        {{$user->jvprofile->city}},&nbsp;{{$user->jvprofile->state}},
                        Pincode:&nbsp; {{$user->jvprofile->pincode}}</h5></p>
        
        
        --}}

        

        </div>
      </div>
    </div>
</section>

