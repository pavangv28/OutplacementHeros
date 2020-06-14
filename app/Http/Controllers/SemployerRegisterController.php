<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Company;
use App\semployers;
use Hash;

class SemployerRegisterController extends Controller
{
    public function semployerRegister(Request $request){
        
        $this->validate($request,[
            'cname'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255',
            'password'=>'required|string|min:8|confirmed'
        ]);

        $employerRole = Role::where('name', 'semployer')->first();

    	 $user =  User::create([
            'email' => request('email'),
            'name' => request('name'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
        ]);
            semployers::create([
                'user_id' => $user->id,
                'cname' => request('cname'),
                'slug'=>str_slug(request('cname')),
                'authority_designation' => request('authority_designation'),
            ]);

        $user->roles()->attach($employerRole->id);
        //$user->roles()->attach($employerRole);
        //$user->attachRole($employerRole);
        $user->sendEmailVerificationNotification();

       
        //return redirect()->back()->with('message','A verification link is sent to your email. Please verify.');
        // return redirect()->back()->with('message','A verification link is sent to your email. Please follow the link to verify it');
        return redirect()->back()->with('message','A verification link is sent to your email. Click the link to verify.');
       //return redirect()->to('login')->with('message','A verification link is sent to your email. Please follow the link to verify it');
       
    }
}
