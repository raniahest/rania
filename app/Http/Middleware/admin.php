<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class admin
{ 
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
  
     public function handle($request, Closure $next, $role)
     {
        //dd($role);
         // Check if user is authenticated
         if (Auth::check()) {
             // Get the authenticated user
             $user = Auth::user();
             
             // Check if user's role matches the required role
             if ($user->role === $role) {
               dd($user->role);  // User's role matches, allow the request to proceed
                 return $next($request);
             }
         }
 
       return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
      // abort(403);
    }
   
}