<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Profile;
use App\Company;
use App\Job;
use App\Role;
use App\VolunteerProfile;
use App\JvolunteerProfile;
use App\Skill;
use App\Education;
use App\Work;
use App\semployers;
use App\consultant;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function company(){
        return $this->hasOne(Company::class);
    }
    public function secompany(){
        return $this->hasOne(semployers::class);
    }
    public function consultant(){
        return $this->hasOne(consultant::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }


    public function vprofile(){
        return $this->hasOne(VolunteerProfile::class);
    }

    public function jvprofile(){
        return $this->hasOne(JvolunteerProfile::class);  //JvolunteerProfile
    }

    function skills() {
        return $this->belongsToMany('App\Skill')->withTimeStamps();
    }

    function educations() {
        return $this->hasMany('App\Education');
    }

    function works() {
        return $this->hasMany('App\Work');
    }

}
