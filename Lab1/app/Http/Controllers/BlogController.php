<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{

    function postsIndex(){
        $posts = [
            ['id' => 1, 'title' => 'PHP', 'description' => "Laravel", 'post_creator' => 'Ebram', 'created_at' => '07-05-2023'],
            ['id' => 2, 'title' => 'Python', 'description' => "PHP", 'post_creator' => 'Mario', 'created_at' => '07-05-2023'],
            ['id' => 3, 'title' => 'JavaScript', 'description' => "JS", 'post_creator' => 'Ismail', 'created_at' => '07-05-2023'],
        ];
    
        return view("posts.index", ['posts'=>$posts]);
    }
    

    public function create()
    {
        return view('posts.create');
    }
}
