<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // Show all Posts
    public function index(){
        //Alternatively, you can use Request $request as parameter in method to get a instance of request
        return view("posts/index", [
            "posts" => Posts::latest()->filter(request(["tag", "search"]))->get()
        ]);
    }

    // Show a single Post
    // Uses route model binding. The parameter "posts" is implicitly understood by the type and equal name in function
    // Alternatively: you could do a check to see if a given post (by id) exists, then show or throw response 404
    public function show(Posts $posts){
        return view("posts/show", [
            "post" => $posts
        ]);
    }

    //Name conventions
    /* 
        index - show all posts
        show - get single post
        create - Show form to create a new post
        store - Stores/saves a new post
        edit - Show form to edit a post
        update - Update a Post
        destroy - Delete a post
    */
}
