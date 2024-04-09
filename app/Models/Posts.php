<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = ["title", "subtitle", "content", "tags", "owner"];

    //Overriding function. Exists behind framework eloquent logic
    public function scopeFilter($query, array $filters){
        //if tag exists in url param
        if($filters["tag"] ?? false){
            $query->where("tags", "like", '%' . request("tag") . '%');
        }

        if($filters["search"] ?? false){
            $query->where("title", "like", '%' . request("search") . '%')
            ->orWhere("tags", "like", '%' . request("search") . '%');
        }
    }
}
