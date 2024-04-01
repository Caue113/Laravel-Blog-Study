<?php

use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/', function () {
    return view('index');
});



/* Users zone. No regex validation needed */
Route::get("/users", function(){
    return response("<h1>Users</h1>");
});

Route::get("/user/{userHandle}", function($userHandle){
    return response("<h1>Users</h1><br> <p> User is: " . $userHandle . "</p>");
});

/* Posts. It has validation in id, since it must be a number */
Route::get("/posts", function(){
    return response("<h1>Posts</h1>");
});

Route::get("/posts/{id}", function($id){
    //dd();
    //ddd();
    if(is_null($id)){
        return response("No user found", 400,)->header("Content-Type", "text/plain");
    }
    return response("This Post: " . $id);
})->where("id", "[0-9]+");


/* Other Routes */

Route::get("/search", function(Request $req){
    dd($req);
});
