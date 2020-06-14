@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 200px; background: #038cfc;">
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Job Seekers</h1>
              </div>
          </div>
    </div>
</div>
   
<section class="ftco-section bg-light">
	<div class="container">
				<!--<div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Registered Candidates</span>
                    <h2 class="mb-4"><span>Recent</span> Seekers</h2>
                </div>
                </div>-->
		
		<div class="row">
            @if(count($seekers)>0)
			@foreach($seekers as $seeker)
          <div class="col-md-12 ftco-animate">
                   
					<div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                       
                            <div class="col-4 col-md-3">
                            <div class="d-flex">
                            
                                @if(empty($seeker->profile_pic))
                                
                                    <img src="{{asset('profile_pic/man.jpg')}}" class="im">
                                    
                                    @else
                                    
                                    <img src="{{asset('uploads/profile_pic')}}/{{$seeker->profile_pic}}"  class="im">
                                    
                                    @endif
                            
                            </div>
                            </div>
                            <div class="col-8 col-md-7">
                                <div class="mb-2 mb-md-0 mr-5">
                                    <div class="job-post-item-header d-flex align-items-center">
                                    <h4 class="mr-3 text-black">{{$seeker->user->name}}</h4>
                                    </div>
                                
                                    <div class="job-post-item-body d-block d-md-flex">
                                        <div class="mr-3"><p>{{$seeker->user->email}}<br>
                                        {{$seeker->industry}}<br>
                                        {{$seeker->experience_years}}{{$seeker->experience_years}}<br>
                                        {{--<div class="mr-3"><span class="icon-layers"></span> <a href="#">{{$seeker->experience}}</a>--}}
                                        <span class="icon-my_location"></span> <span>{{$seeker->state}}</span></div>
                                        </div>
                                    </div>
                                
                                    {{--<div class="job-post-item-body d-block d-md-flex">
                                    <div class="mr-3"><span class="icon-layers"></span> <a href="#">{{$seeker->experience}}</a></div>
                                    <div><span class="icon-my_location"></span> <span>{{$seeker->address}}</span></div>
                                    </div>--}}
                                </div>
                            </div>
                    
                    <div class="col-6 col-md-2">
					<div class="ml-auto d-flex">
                    <a href="{{route('seeker.show',[$seeker->user_id])}}" class="btn btn-info btn-sm active"  role="button" aria-pressed="true">View</a>
                     </div>
                    </div>
			  
			  
				</div>
          </div>
          @endforeach
          @else
          No Registered Job Seekers
          @endif
		  <!-- end -->
 
				</div>
				<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
			</div>
		</section>
		
@endsection


<style>

    .im{display:inline-block;
        margin-top:10px;
        margin-left:5px;
        margin-right:5px;
        width: 100px;
        height: 100px;
        border-radius: (50%);
        position: relative;
    }

</style>
    