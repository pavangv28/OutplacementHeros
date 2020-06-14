<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\User;
use App\Company;
use App\semployers;
use App\VolunteerProfile;
use App\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        
        if(auth::user()->user_type=='employer'){
            $id = auth()->user()->company->id;
            $company = auth()->user()->company->slug;
            
            return redirect()->to('/company/'.$id.'/'.$company);
            
            //return redirect()->to('/company/create');
            //redirect("/user/{$user->id}/profile");
        }
        if(auth::user()->user_type=='consultant'){
            $id = auth()->user()->consultant->id;
            $company = auth()->user()->consultant->slug;
            
            return redirect()->to('/consultant/'.$id.'/'.$company);
            
            //return redirect()->to('/company/create');
            //redirect("/user/{$user->id}/profile");
        }
        if(auth::user()->user_type=='semployer'){
            $id = auth()->user()->secompany->id;
            $company = auth()->user()->secompany->slug;
            
            return redirect()->to('/secompany/'.$id.'/'.$company);
            
            //return redirect()->to('/company/create');
            //redirect("/user/{$user->id}/profile");
        }

         
        if(auth::user()->user_type=='seeker'){
            $id = auth()->user()->id;
            
            return redirect()->to('/user/'.$id);


            //return redirect()->to('/user/profile');
            }

            if(auth::user()->user_type=='volunteer'){
                $id = auth()->user()->id;
                return redirect()->to('/vseekers');
                //return redirect()->to('/volunteer/'.$id);
    
                }

            
                if(auth::user()->user_type=='jvolunteer'){
                    $id = auth()->user()->id;
                    return redirect()->to('/jvseekers');
                    //return redirect()->to('/volunteer/'.$id);
        
                    }

        $adminRole = Auth::user()->roles()->pluck('name');
            if($adminRole->contains('admin')){
                return redirect('/dashboard');
            }

  
    
    
    //$jobs  = Auth::user()->favorites;
    //return view('home',compact('jobs'));
       
    }
}
