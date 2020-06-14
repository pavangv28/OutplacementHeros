<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use \App\User;
use App\Role;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        //dd($roles) ;
        if(Auth::check()){
            if(empty($roles)) $roles = ['admin'];

            $userRole = Auth::user()->roles()->pluck('name');
            
                foreach($roles as $role) {
                    if($userRole->contains($role)) { 
                        return $next($request); 
                    } 
                } 
                return redirect('/');   
         }
        else
        return redirect('/');
    }
}
