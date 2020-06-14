<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\User;
use App\Post;
use Auth;

class OutplacementherosController extends Controller
{
    public function index(){

        $posts = Post::where('status',1)->latest()->take(4)->get();
        return view('welcome',compact('posts'));

   }
}
