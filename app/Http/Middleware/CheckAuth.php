<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('manage')->check() ){
            Auth::shouldUse('manage');
           return $next($request);
        }elseif(Auth::guard('tech')->check()){
            Auth::shouldUse('tech');
           return $next($request);
        }else{
            return to_route('login_form');

        }
    }
}