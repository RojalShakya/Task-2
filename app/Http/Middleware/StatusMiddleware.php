<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::user()->role!='admin'&& Auth::user()->status=='inactive'){
            return redirect()->route('verification');
        }elseif(Auth::user()->role=='user'&& Auth::user()->status=='active'){
            return redirect()->route('frontend-home');
        }


        return $next($request);
    }
}
