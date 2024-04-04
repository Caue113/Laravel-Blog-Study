<?php

namespace App\Models;

class Posts{

    //Should get from database
    public static function getAll(){
        return [
                "posts" =>
                    [
                        [
                            "id" => 1,
                            "owner" => "John",
                            "title" => "I skydived. And it was RAD!",
                        ],
                        [
                            "id" => 2,
                            "owner" => "Marie",
                            "title" => "How to make cupcakes"
                        ],
                        [
                            "id" => 3,
                            "owner" => "Austin",
                            "title" => "My path into the wilderness"
                        ]
                    ]
                ];
    }

    //Should be done in database
    public static function find($id){
        $posts = self::getAll();
        $posts = $posts["posts"];
        
        foreach ($posts as $post) {
            if($post["id"] == $id){
                return $post;
            }
        }
        
        return [
            "status" => "404",
            "status_message" => "Not found"
        ];
    }
}