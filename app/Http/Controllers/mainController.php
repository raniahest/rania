<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function adminMain()
{
    // Retrieve all users from the database
    $users = User::all();

    // Pass the users data to the view
    return view('main', ['users' => $users]);
}
}
