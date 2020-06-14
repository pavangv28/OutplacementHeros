<?php

namespace App;
use App\User;
use Auth;

use Illuminate\Database\Eloquent\Model;

class VolunteerProfile extends Model
{
    protected $fillable = [
        'user_id','dob','gender','phone','address_line1','address_line2',
        'country','state','city','pincode','qualification','industry','designation',
        'function','profile_pic',
    ];


    public function user(){
    	return $this->belongsTo('App\User');
    }

}
