<?php

namespace App;
use App\User;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    //protected $guarded = [];

    protected $fillable = ['name'];
    
    public function user(){
    	return $this->belongsToMany('App\User');
    }

}
