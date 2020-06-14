<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Education;
use App\User;
use Auth;

class EducationController extends Controller
{
    public function storeEducation(Request $request) {


        $new_education = new Education();
        $new_education->qualification = $request->qualification;
        $new_education->course = $request->course;
        $new_education->specialization = $request->specialization;
        $new_education->institute = $request->institute;
        $new_education->c_type = $request->c_type;
        $new_education->performance_scale = $request->cmbParameter2;
        $new_education->performance = $request->mytext;
    	$new_education->p_year = $request->p_year;    	
    	$new_education->user_id = auth()->user()->id; 
        $new_education->save();
        
        /*    $table->string('qualification')->nullable()->change();
            $table->string('course')->nullable()->change();
            $table->string('specialization')->nullable()->change();
            $table->string('institute')->nullable()->change();
            $table->string('c_type')->nullable()->change();
             $table->string('performance_scale')->nullable();
            $table->string('performance')->nullable();
            $table->string('p_year')->nullable()->change();
            $table->integer('user_id'); */
    }

    public function updateEducation(Request $request) {    	
     	$id = $request->id;
    	$education = Education::find($id);
    	$education->qualification = $request->qualification;
        $education->course = $request->course;
        $education->specialization = $request->specialization;
        $education->institute = $request->institute;
        $education->c_type = $request->c_type;
        $education->performance_scale = $request->cmbParameter2;
        $education->performance = $request->mytext;
    	$education->p_year = $request->p_year;
    	$education->save();
    }

    public function deleteEducation(Request $request) { 
    	$id = $request->id;
   		Education::findOrFail($id)->delete(); 
    }
}
