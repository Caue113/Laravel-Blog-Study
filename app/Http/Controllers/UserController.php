<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    //Show form to create/register
    public function create(User $user){   
        return view("users/register");
    }

    public function login(User $user){   
        return view("users/login");
    }

    public function authenticate(Request $request){   
        //Paassword is already hashed by framework
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => "required",
        ]);

        //Create and automatically login
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended()->with("message", "Sucessfully logged in");
        }
        
        return back()->withErrors(["email" => "Credentials not found"])->onlyInput("email");
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

        return redirect("/login")->with("message", "User created");
    }

    public function logout(Request $request){
        auth()->logout();

        //Invalidate previous session
        $request->session()->invalidate();

        //Generante new csrf token
        $request->session()->regenerateToken();

        return redirect("/")->with("message", "You logged out sucessfully");
    }
}
