<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;

class SeekerController extends Controller
{

    /*public function __construct(){
       $this->middleware(['employer','verified']);
        //$this->middleware('listseekers');
    }*/


    
   public function index(){

    $seekers = Profile::get();

    return view('listseeker.index', compact('seekers'));

   }


   public function show_profile($id){

        $user = User::findOrFail($id);
        return view('listseeker.show', compact('user'));
        //return view('welcome',compact('jobs', 'companies'));

   }








    /*public function index($id){
    	$jobs = Job::where('user_id',$id)->get();
    	return view('company.index',compact('company'));
    }*/


    /*public function allSeeker(){
    	$seeker = User::latest()->limit(10)->get();
        return view('listseeker.allseeker',compact('seeker'));
    }*/
}
