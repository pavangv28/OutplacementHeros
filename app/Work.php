<?php

namespace App;
use App\User;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $guarded = [];

    function user() {
    	return $this->belongsTo('App\User');
   }
}
