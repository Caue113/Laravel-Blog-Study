<?php

use App\Models\Posts;
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
    return view("userListing", [
        "heading" => "Some nice text",
        "users" => [
            [
                "id" => 1,
                "name" => "John",
                "bio" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptates quod dolore quam sint ex nobis nisi laboriosam quae facere cumque ratione, placeat labore? Repellendus, porro. Obcaecati dolore nulla id."
            ],
            [
                "id" => 2,
                "name" => "Marie",
                "bio" => "Repellendus, porro. Obcaecati dolore nulla id."
            ],
            [
                "id" => 3,
                "name" => "Austin",
                "bio" => "Hello id"
            ]
        ]
    ]);
});

Route::get("/user/{userHandle}", function($userHandle){
    return response("<h1>Users</h1><br> <p> User is: " . $userHandle . "</p>");
});

/* ============= Posts ================ */


Route::get("/posts", function(){
    return view("postListing", [
        "posts" => Posts::all()
    ]);
});

// Uses route model binding. The parameter "posts" is implicitly understood by the type and equal name in function
// Alternatively: you could do a check to see if a given post (by id) exists, then show or throw response 404
Route::get("/posts/{posts}", function(Posts $posts){
    return view("postListingSingle", [
        "post" => $posts
    ]);
});


/* Other Routes */

//Function can take Request as parameters, which will show a data structure of a Request. All of them are accessible
Route::get("/search", function(Request $req){
    dd($req);
});
