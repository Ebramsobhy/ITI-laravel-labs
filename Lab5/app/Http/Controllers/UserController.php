<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.showUsers',['users'=>$users]);
    }


    public function show($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->paginate(5);
        // return view('users.showPostUser', compact('user', 'posts'));
        return view('users.showPostUser', ['user' => $user, 'posts' => $posts]);
    }

    // public function show(User $user)
    // {
    //     $posts = $user->posts;

    //     return view('users.showPostUser', ['user' => $user, 'posts' => $posts]);
    // }

    // public function show(User $user)
    // {
    //     $posts = $user->posts()->paginate(5);
    //     return view('users.showPostUser', compact('user', 'posts'));
    // }
    
 
}
