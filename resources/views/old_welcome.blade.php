@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Openings</h1>
        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td><img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" width="80"></td>
                    <td>Position: {{$job->position}}</td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; Address:{{$job->address}}</td>
                    <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{$job->created_at->diffForHumans()}}</td>
                    
                    
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                        <button class="btn btn-success btn-sm">Apply</button>
                        </a>
                    </td>
                
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div>
        <button class="btn btn-success btn-lg" style="width: 100%">Browse all jobs</button>

    </div>
    <br> <br>
    <h1>Featured Companies</h1>

</div>

<div class="container">
<div class="row">

@foreach($companies as $company)
<div class="col-md-3">
   <div class="card" style="width: 18rem;">
   
        <img src="{{asset('uploads/logo')}}/{{$company->logo}}" width="80">
        
        <div class="card-body">
            <h5 class="card-title">{{$company->cname}}</h5>
            <p class="card-text">{{str_limit($company->description,20)}}</p>
            <a href="{{route('company.index', [$company->id,$company->slug])}}" class="btn btn-primary">Visit company</a>
        </div>
    </div>
</div>

@endforeach

</div>
</div>
@endsection
