<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Userauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //return $next($request);
        if($request->path()=='login' && $request->session()->has('user'))
        {
            return redirect('/');
        }
        return $next($request);
    }
}
