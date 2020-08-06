<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;

class CheckAdmin
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
        $UserRole = Auth::user()->roles->pluck('name');
        if(!$UserRole->contains('admin')){ 
            return redirect('/user_dashboard');
        }

       
        // else{
        //     return redirect('/admin_dashboard');
        // }
        return $next($request);
    }
}
