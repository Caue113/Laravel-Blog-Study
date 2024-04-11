<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    //Show form to create/register
    public function create(User $user){   
        return view("users/register");
    }

    public function store(Request $request){   
        $formFields = $request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", Rule::unique('users', 'email'), "email"],
            "password" => "required|confirmed|min:5",
        ]);


        //Hash passwords
        $formFields['password'] = bcrypt($formFields['password']);
        
        //Create and automatically login 
        $user = User::create($formFields);

        //Login
        auth()->login($user);
        return redirect("/posts")->with("message", "User created and logged in");
    }
}
