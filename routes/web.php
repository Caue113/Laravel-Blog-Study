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

Route::get("/posts/{id}", function($id){
    //dd();
    //ddd();
    /* if($id > 9 || $id < 0){
        return response("No user found", 404,)->header("Content-Type", "text/plain");
    } */
    return view("postListingSingle", [
            "post" => Posts::find($id)
        ]);
})->where("id", "[0-9]+");


/* Other Routes */

//Function can take Request as parameters, which will show a data structure of a Request. All of them are accessible
Route::get("/search", function(Request $req){
    dd($req);
});
