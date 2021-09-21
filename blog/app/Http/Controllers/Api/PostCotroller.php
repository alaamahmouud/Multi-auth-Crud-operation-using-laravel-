<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Item;
use App\Models\user;
use App\Http\Resources\PostResource;
class PostCotroller extends Controller
{
    public function index(){
        $posts = Post::all(); 

        return $posts;
    }

    public function show($test)
    {
        $posts = Post::find($test);

        return $posts ;
    }
    public function store(request $req)
    {

    $posts = post::create([
        'title' =>$req['title'],
        'description' =>$req['description'],
        'user_id' =>$req['post_creator'],
    ]);
        return $posts ;

    }

    public function update(request $req , Post $post)
    {
        
        // @dd($postUpdate);

        $post->update([
            'title' => $req->title,
            'description' => $req->description,
        ]);
        
        // @dd('$postUpdate');
       
        return new PostResource($post) ;
    }

    public function destroy($id)  
    {  
        post::find($id)->delete();

        return response()->json([
            'status' => 200,
            'message' => "Post deleted successfully!"
        ]);
    } 
 
}
