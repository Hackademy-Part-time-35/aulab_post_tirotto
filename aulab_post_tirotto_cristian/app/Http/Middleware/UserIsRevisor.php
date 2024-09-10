<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserIsRevisor

{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
   
  {
    
    if(Auth::user() && Auth::user()->is_revisor){

      if(Auth::user() && Auth::user()->is_writer){
        
        return $next($request);
      }
        
    }
    return redirect(route('homepage'))->with('alert','Non sei autorizzato');


  }}