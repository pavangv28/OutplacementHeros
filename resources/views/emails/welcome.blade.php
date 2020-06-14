
@component('mail::message')
# OutPlacementHeroes

Hello {{$name}},
<br>
Your are been added by your company <b> '{{$cname}}'</b> for outplacement service by OutPlacementHeroes
<br>
Please update your details to avail following facilities through www.OutplacementHeros.Org
<br>

 1.Recommending you suitable job opportunities related to your profile.<br>
 2.Connecting you with volunteer mentors who can guide you to prepare for your next interviews.<br>
 3.Extending help by searching suitable jobs for you through volunteers.<br>
Please register at link here<br>




@component('mail::button', ['url' => 'http://127.0.0.1:8000/register'])
Register
@endcomponent
This service is free of any charges and we expect you to maintain seriousness by actioning on every suggestion from www.OutplacementHeros.Org.<br>
Best Regards<br>
Job Seeker support Team<br>
OutplacementHeros 

Thanks,<br>
{{ config('app.name') }}
@endcomponent
