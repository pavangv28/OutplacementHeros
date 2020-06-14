<?php

namespace App;
use App\User;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    function user() {
        return $this->belongsToMany('App\User');
    }
}
