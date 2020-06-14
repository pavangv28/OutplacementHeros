<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semployers extends Model
{
    //
    protected $table='semployers';
    protected $fillable = [
        'user_id', 'cname', 'slug','phone','address_line1','address_line2',
        'country','state','city','pincode','industry','website','linkedin',
        'twitter','facebook','logo','cover_photo','slogan','description',
        'authority_designation'
    ];
    
        public function jobs(){
            return $this->hasMany('App\Job');
        }
    
        public function getRouteKeyName(){
            return 'slug';
        }
    
        public function user(){
            return $this->belongsTo('App\User');
        }
}
