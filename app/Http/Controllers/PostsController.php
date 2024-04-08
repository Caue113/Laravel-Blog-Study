<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // Show all Posts
    public function index(){
        return view("postListing", [
            "posts" => Posts::all()
        ]);
    }

    // Show a single Post
    // Uses route model binding. The parameter "posts" is implicitly understood by the type and equal name in function
    // Alternatively: you could do a check to see if a given post (by id) exists, then show or throw response 404
    public function show(Posts $posts){
        return view("postListingSingle", [
            "post" => $posts
        ]);
    }
}
