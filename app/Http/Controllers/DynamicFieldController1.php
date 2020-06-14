<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Company;
use App\Job;
use App\User;
use App\Country;
use App\State;
use App\City;
use App\Designation;
use App\Industry;
use App\semployers;
use Auth;
use App\DynamicField;
use Validator;


class DynamicFieldController1 extends Controller
{
    //
    function index()
    {
     return view('dynamic_field');
    }

    function insert(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $company = consultant::where('user_id', $user->id)->first();
     if($request->ajax())
     {
      $rules = array(
       'fname.*'  => 'required',
       'email.*'  => 'required',
       'number.*' => 'required'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

      $fname = $request->fname;
      $email = $request->email;
      $number=$request->number;
      for($count = 0; $count < count($fname); $count++)
      {
       $data = array(
        'fname' => $fname[$count],
        'email'  => $email[$count],
        'number'=>$number[$count],
        'Company'=>$company->cname
       );
       $insert_data[] = $data; 
      }
      for($count = 0; $count < count($fname); $count++)
      {
          Mail:: to($email[$count])->send(new WelcomeMail($fname[$count],$company->cname));
      }

      DynamicField::insert($insert_data);


      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
     }
    }
}
