<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\JvolunteerProfile;
use App\Role;

class JvolunteerRegisterController extends Controller
{
    public function jvolunteerRegister(Request $request){
        
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed',
            'dob'=>'required',
            'gender'=>'required'
        ]);

        $volunteerRole = Role::where('name', 'jvolunteer')->first();

    	 $user =  User::create([
            'email' => request('email'),
            'name' => request('name'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
        ]);
      
        JvolunteerProfile::create([
            'user_id' => $user->id,
            'gender' => request('gender'),
            'dob'=>request('dob')

        ]);

        $user->roles()->attach($volunteerRole->id);
        $user->sendEmailVerificationNotification();

       
        //return redirect()->back()->with('message','A verification link is sent to your email. Please verify.');
        return redirect()->back()->with('message','A verification link is sent to your email. Click the link to verify.');
       
    }
}
