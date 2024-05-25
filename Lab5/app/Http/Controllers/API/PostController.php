<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Requests\API\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct(){
        $this->middleware('auth:sanctum')->only('store');
        $this->middleware('auth:sanctum')->only('update');
        $this->middleware('auth:sanctum')->only('destroy');
    }

    public function index()
    {
        //
        // return Post::all(); 
        return PostResource::collection(Post::all()); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
        // $request->validate(['title'=>'required']);
        $post = Post::create($request->all());
        $this->save_image($request->image, $post);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // 
        if ($post){
            return new PostResource($post);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
    //    $request->validate(['title'=>'required']);
       $old_image = $post->image;
       $post->update($request->all());
       $this->save_image($request->image, $post);
       return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return new Response('', 204);
    }


    public function save_image($image, $post)
    {
        if($image){
            $image_name = time().'.'.$image->extension();
            $post->image = $image_name;
            $image->move(public_path('assets/posts/images'), $image_name);
            $post->save();
        }
    }

    private function delete_image($image_name){
        if($image_name !='post.png' and ! str_contains($image_name, '/tmp/'))
        {
            try{
                unlink(public_path('assets/posts/images'.$image_name));
            }catch(Exception $e){
                echo $e;
            }
        }
    }
}
