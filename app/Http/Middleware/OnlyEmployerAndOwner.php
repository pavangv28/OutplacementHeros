<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class OnlyEmployerAndOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
    $id = $request->routes('user'); // For example, the current URL is: /posts/1/edit

    $user = App\User::where('id', $id)->first();

    if($post) return $next($request); // They're the owner, lets continue...

    return redirect()->to('/'); // Nope! Get outta' here

    /*$user = App\User::findOrFail($id); // Fetch the post

    if($user->id == $this->auth()->id)
    {
        return $next($request); // They're the owner, lets continue...
    }

    return redirect()->to('/'); // Nope! Get outta' here.*/


    }
    
}
