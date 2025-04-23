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
        if(Auth::check()){
        foreach(Auth::user()->roles as $role)
      {  if($role->name=='User'){
            dd('x');
            return redirect()->route('verification');

        }elseif($role->name=='Customer'){
            return redirect()->route('frontend-home');
        }
      }
    }else{
        return abort(401);
    }

      return $next($request);
    }
}
