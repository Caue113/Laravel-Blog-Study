<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/posts", function(){

    file_put_contents(dirname(__DIR__) . "/_myFiles/myText.txt", "Times accessed: ");
    
    return response()->json([
        "posts" =>[
            "this dir3" => dirname(__DIR__),
            [
                "title" => "A sunny day in Miami",
                "date" => "Today"
            ],
            [
                "title" => "A night in Londres",
                "date" => "13/05/2020"
            ]            
        ]
    ]);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
