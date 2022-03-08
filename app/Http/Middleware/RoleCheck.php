<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,... $roles)
    {
        if (!Auth::check()) 

            return response('not allowed',401);
        $user = Auth::user();
    
        if($user->isAdmin())
            return $next($request);
    
        foreach($roles as $role) {
            if($user->hasRole($role))
                return $next($request);
        }
        return response('not allowed',401);
  
    }

}
