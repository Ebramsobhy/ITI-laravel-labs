<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\PostResource;

class PostController extends Controller
{

    public function index()
    {    
        $posts = Post::all();
        $posts = Post::paginate(5);
        
        foreach ($posts as $post)
        {
            $post['created_at'] = Carbon::parse($post['created_at'])->setTimezone('Africa/Cairo')->format('d.m.Y H:i:s');
        }
        return view('posts.posts',['posts'=>$posts]);
    }

    public function create()
    {   
        $users = User::all(); 
        return view('posts.createPost', ['users'=>$users]);
    }

    public function store()
    {
        request()->validate([
            "title" => "required|min:3|unique:posts",
            "description" => "required|min:10"
        ]);

        $post_info = request()->all(); 
        $post = new Post();
        $image = request()->image;
        if($image){
            $image_name = time().'.'.$image->extension();
            $post->image = $image_name;
            $image->move(public_path('assets/posts/images'), $image_name);
        }
        $post->title= $post_info['title'];
        $post->description = $post_info['description'];
        $post->user_id = $post_info['user_id'];
        $post->save();
        return to_route('posts.showPost');
    }
    

    public function show(Post $post)
    {
        return view('posts.showPost', ['post'=>$post]);
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.editPost', ['post'=>$post, 'users'=>$users]);
    }

    public function update(UpdatePostRequest $request, Post $post)
   {
    $request->validate([
        'title' => ['required','min:3',
            Rule::unique('posts')->ignore($post->id) ],
        'description' => 'required|min:10',
    ]);
    
    $post_info = $request->all(); 
    $image = request()->image;

    if($image){
        $image_name = time().'.'.$image->extension();
        $post->image = $image_name;
        $image->move(public_path('assets/posts/images'), $image_name);
    }

    $post->title = $post_info['title'];
    $post->description = $post_info['description'];
    $post->user_id = $request->user_id;
    $post->save();

    return redirect()->route('posts.showPost');
}

  
    // public function destroy(Post $post)
    // {
    //     $post->delete();
    //     return redirect()->route('posts.showPost');
    // }

    public function destroy(Post $post)
    {
        return view('posts.confirmDelete', ['post' => $post]);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.showPost');
    }


     function get_posts(){
        $posts = Post::all();
        return $posts;
     }
    


}
