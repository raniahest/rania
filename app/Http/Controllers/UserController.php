<?php

namespace App\Http\Controllers;
use App\Http\Requests\addRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
class UserController extends Controller
{
    /*public function addUser(){
        return view('addUser');
       // return view('addUser')->with('adduser', true);
    }*/
    public function storeUser(addrequest $request)
    {
        $userinfo = $request->validated();
        // Create a new User instance
        //dd($userinfo);
        $user = User::create([
            'name' => $userinfo['name'],
            'idUser' => $userinfo['idUser'],
            'email' => $userinfo['email'],
            'password' => bcrypt($userinfo['password']), // Hash the password
            
            'role'=>$userinfo['role'],
            'username' => $userinfo['username'],
            'matricule'=>$userinfo ['matricule'],
            'nom'=>$userinfo['nom'],
        ]);
       
        // Redirect or return a response after storing the user
        return view('main')->with('isAdmin', true)->with('success', 'User created successfully!');
    }
   /* public function modifyUser(){
        return view('modifyUser');
    }*/
    public function showUsers()
{
    $users = User::all();
    return view('userliste', ['users' => $users]);
}

 public function submitForm(Request $request, $idUser)
    {
        $user = User::findOrFail($idUser);
        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }
        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }
        if ($request->filled('username')) {
            $user->username = $request->input('username');
        }
        if ($request->filled('role')) {
            $user->role = $request->input('role');
        }
        if ($request->filled('nom')) {
            $user->nom = $request->input('nom');
        }
    // Save the updated user
        $user->save();
    
        // Redirect back or return a response
        return redirect()->back()->with('success', 'User info updated successfully!');
    }
    public function deleteUser( $idUser){
          // Find the user by ID
    $user = User::findOrFail($idUser);

    // Delete the user
    $user->delete();

    // Redirect back or return a response as needed
    return redirect()->back()->with('success', 'User deleted successfully!');
    }
    
}




