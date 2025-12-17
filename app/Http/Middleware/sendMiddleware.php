<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class sendMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    // if(Auth::check()){
    //   return to_route("lesson_address");
    // }else 
    
        if (!Auth::check()) {
            
            session()->put('url.intended',$request->fullUrl());
                
            
            return to_route("user.login");
        }

        return $next($request);
    }
}