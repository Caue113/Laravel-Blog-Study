<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    

    // Show all Posts
    public function index(){
        $POSTS_PER_PAGE = 3;
        //Alternatively, you can use Request $request as parameter in method to get a instance of request
        return view("posts/index", [
            "posts" => Posts::latest()->filter(request(["tag", "search"]))->paginate($POSTS_PER_PAGE)
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


    public function create(Request $request){
        return view("posts/create");
    }

    public function store(Request $request){
        $formFields = $request->validate([
            "title" => "required",
            "content" => "required",
            "tags" => "required",
            "subtitle" => "required",
            "bgImage" => ""
        ]);

        if($request->hasFile("bgImage")){
            $formFields["bgImagePath"] = $request->file("bgImage")->store("bgImages", "public");            
        }

        try {
            $formFields["owner"] = auth()->id();
        }
        catch (\Throwable $th) {
            throw $th;
        }
        

        Posts::create($formFields); //Creates row in database
        return redirect("/");
    }


    public function edit(Request $request){        
        $_post = Posts::select("*")->where('id', $request["id"])->first();
        return view("/posts/edit", [
            "post" => $_post
        ]);

        // if you want to use Route Model Biding, you can simply use the $post
        // edit(Posts $post)
        // $_post = $post
    }

    public function update(Request $request){
        $post = Posts::select("*")->where('id', $request["id"])->first();
  

        if(empty($request['id'] || is_null($request['id']))){
            echo "error";
            dd($request);
        }

        $filledParameters = $request->all();

        $filledParameters = array_filter($filledParameters, function($value){
            if(!is_null($value)){
                return $value;
            }
        });

        //TODO: Delete or overwrite earlier image. This is creating the image again
        if($request->hasFile("bgImage")){
            //Code: Storage::disk('public')->exists($post['bgImagePath'])
            $filledParameters["bgImagePath"] = $request->file("bgImage")->store("bgImages", "public");            
        }

        
        $post->update($filledParameters);


        //redirect("/posts/edit");  //TODO: return user to posts searcher once finish
        return redirect("/posts");
    }

    public function destroy(Posts $post){        
        //TODO: Should delete any files attached to it as well
        $post->delete();

        return redirect("/posts")->with("status", "Deleted sucessfuly");
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
