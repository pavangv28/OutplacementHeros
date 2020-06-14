<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Industry;

class Job extends Model
{

  protected $fillable = ['user_id','company_id','title','slug','description',
  'position','salary','roles','function','category_id','address_line1','address_line2',
  'country','state','city','pincode','type','notice_period','status','last_date',
  'number_of_vacancy','qualification','experience','gender','preferences'];


    public function getRouteKeyName(){
		return 'slug';
    }
    
    public function company(){
    	return $this->belongsTo('App\Company');
    }

    public function users(){
      return $this->belongsToMany(User::class)->withTimeStamps();
  }


}
