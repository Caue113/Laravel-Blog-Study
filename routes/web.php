<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
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



/* ==============   Users   ============== */
Route::get("/register", [UserController::class, "create"])->middleware("guest");

Route::get("/login", [UserController::class, "login"])->name('login')->middleware("guest");

Route::post("/users/authenticate", [UserController::class, "authenticate"]);

Route::post("/logout", [UserController::class, "logout"])->middleware("guest");

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

Route::post("/users", [UserController::class, "store"]);

Route::get("/user/{userHandle}", function($userHandle){
    return response("<h1>Users</h1><br> <p> User is: " . $userHandle . "</p>");
});

/* ============= Posts ================ */

// Show all posts
Route::get("/posts", [PostsController::class, "index"]);

// Store post
Route::post("/posts", [PostsController::class, "store"]);

// Create post
Route::get("/posts/create", [PostsController::class, "create"])->middleware("auth");

// TODO: Show post explorer to user to select a post to edit it. 
// Route::get("/posts/edit/", [PostsController::class, "editMany"]);

// Show form to edit specific post
Route::get("/posts/edit/{id}", [PostsController::class, "edit"])->middleware("auth");

// Update post
Route::put("/posts/update/{id}", [PostsController::class, "update"])->middleware("auth");

// Delete Post
Route::delete("/posts/delete/{post}", [PostsController::class, "destroy"])->middleware("auth");

//Must be at the bottom of all, as Laravel searches the first match
Route::get("/posts/{posts}", [PostsController::class, "show"]);

/* Other Routes */

//Function can take Request as parameters, which will show a data structure of a Request. All of them are accessible
Route::get("/search", function(Request $req){
    dd($req);
});
