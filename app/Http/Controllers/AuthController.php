<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    
    public function login(){

        return view('auth.login');
    }
   /* public function __construct()
    {
        $this->middleware('auth');
    }  */  
    public function DoLogin(LoginRequest $request){
    $credentials = $request->validated();
     
    $guard = Auth::guard('web'); 
    
    if ($guard->attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        $user = $guard->user(); // Get the authenticated user
        $role = $user->role; // Retrieve the role of the authenticated user
        
        if($role=="admin"){
           // dd($role);
            return $this->adminRedirect();
            } else {
            return $this->userRedirect();
        }
    }
    //dd($guard->attempt($credentials, $request->filled('remember'))); 
    return redirect()->route('login')->withErrors([
        'email' => 'Email invalid'
    ])->onlyInput('email');
}
protected function adminRedirect()
{
   // dd('true');
    return view('main')->with('isAdmin', true);
    
}
protected function userRedirect()
{
    return view('main')->with('isAdmin', false);
}
}
