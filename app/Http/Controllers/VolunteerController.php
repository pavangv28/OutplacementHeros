<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\VolunteerProfile;
use App\Profile;
use App\User;
use App\Skill;
use App\Country;
use App\State;
use App\City;
use App\Designation;
use App\Industry;
use Auth;


class VolunteerController extends Controller
{
  public function __construct(){
    $this->middleware(['volunteer','verified']);
    }  


    public function index(){
      
          $user_id = auth()->user()->id;
          $user = User::find($user_id);
          $skills = Skill::orderBy('skill', 'asc')->get();     
          $vprofile = VolunteerProfile::where('user_id', $user->id)->first();
          $countries = Country::all()->pluck('name','id');

          if($vprofile->country){
            $coun = Country::where('name', $vprofile->country)->first();
            $coun_id = $coun->id;}
            else {
              $coun_id = "";
            }
          
          if($vprofile->state){
            $s = State::where('name', $vprofile->state)->first();
            $s_id = $s->id;}
            else {
              $s_id = "";
            }
    
            if($vprofile->city){
            $c = City::where('name', $vprofile->city)->first();
            $c_id = $c->id;}
            else {
              $c_id = "";
            }

          
          $designation = Designation::orderBy('designation', 'asc')->pluck('designation');
          $industry = Industry::orderBy('industry', 'asc')->pluck('industry');

          return view('volunteer.index', compact('user', 'vprofile', 'skills','countries','coun_id','s_id','c_id','designation','industry')); 
      }

  public function store(Request $request){
    $this->validate($request,[

      'phone'=>['required', 'numeric', 'regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[0-9]\d{9}$/'],
      'address_line1'=>'required',
      'country'=>'required',
      'state'=>'required',
      'city'=>'required',
      'pincode'=>'required|numeric|digits_between:6,6',
      'qualification'=>'required',
      //'industry' => 'required',
      //'designation' => 'required_with:recent_company',                       
      //'phone'=>'required|numeric|digits_between:10,10',
      ]);

      $user_id = auth()->user()->id;

      $country = Country::where('id',request('country'))->first();
      $state = State::where('id',request('state'))->first();
      $city = City::where('id',request('city'))->first();
    
      VolunteerProfile::where('user_id',$user_id)->update([
        'phone'=>request('phone'),
        'address_line1'=>request('address_line1'),        
        'address_line2'=>request('address_line2'),
        'country'=>$country->name,
        'state'=>$state->name,
        'city'=>$city->name,
        'pincode'=>request('pincode'),
        'qualification'=>request('qualification'),
        'industry'=>request('industry'),
        'designation'=>request('designation'),
        'function'=>request('function'),
        
     ]);

     return redirect()->back()->with('message','Profile Sucessfully Updated!');
 

    }


        public function vprofile_pic(Request $request){
              $this->validate($request,[
                  'profile_pic'=>'required|mimes:png,jpeg,jpg|max:20000'
              ]);
              $user_id = auth()->user()->id;
              if($request->hasfile('profile_pic')){
                  $file = $request->file('profile_pic');
                  $ext =  $file->getClientOriginalExtension();
                  $filename = 'VOL-'.time().'.'.$ext;
                  $file->move('uploads/profile_pic/',$filename);
                  VolunteerProfile::where('user_id',$user_id)->update([
                    'profile_pic'=>$filename
                  ]);
              return redirect()->back()->with('message','Profile picture Sucessfully Updated!');
              }
      
        }

        public function delete_vpic(Request $request){
              $id = request('id');
              $p = VolunteerProfile::findOrFail($id);
              $filename = $p->profile_pic;

              VolunteerProfile::where('id',$id)->update([
                'profile_pic'=>null
              ]);
              
              //$file->move('uploads/profile_pic/',$filename);
              File::delete('uploads/profile_pic/'.$filename);
            
              return redirect()->back()->with('message','Profile picture deleted successfully!');

          }

          public function show($id){
            $user = User::findOrFail($id);

            //Check for correct user
            if(auth()->user()->id !== $user->id){
              return redirect('/')->with('error','Unauthorised Page');
            }

            return view('volunteer.show', compact('user'));

          }

          public function listseekers(){

            $seekers = Profile::get();

            return view('volunteer.dashboard', compact('seekers'));

          }


          public function show_profile($id){

                $user = User::findOrFail($id);
                return view('volunteer.seekerprofile', compact('user'));

          }

}
