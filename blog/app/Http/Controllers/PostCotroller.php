<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Item;
use App\Models\user;



class PostCotroller extends Controller
{
    public function index(){
        $posts = Post::all(); //select * from db //34an hwo elkber..
        // @dd($posts);

        return view('index' , ['posts' => $posts]); //passing paramiter to blade
    }

    public function create()
    {
        $users = user::all(); //select * from users db

        return view('create',['users' => $users ] );

    }

    public function show($test)
    {
        $posts = Post::find($test);
        // @dd($posts);

        return view('show' ,['posts' => $posts] ) ;
    }

    
    public function store(request $req) //request all data from db in $req
    {
    //logic to store data in db

        //   @dd ($req );

    //   $datarequest = request()->all();

    //   @dd ($datarequest );

    //to validate
    $req ->validate([
     'title' =>'required|min:3',
     'description' =>'required|min:3',
     'post_creator' =>['exists:users,id'] ,

    ]);

    $posts = post::create([
        'title' =>$req['title'],
        'description' =>$req['description'],
        'user_id' =>$req['post_creator'],
    ]);
        return redirect()->route('posts.index') ;

    }
 
    public function edit($test)
    {
        $posts = Post::find($test);

        return view('edit',['posts' => $posts ] );
    }


    public function update(request $req , $id)
    {

        $postUpdated = Post::find($id)->update([
            'title' => $req->title,
            'description' => $req->description,
        ]);


        return redirect()->route('posts.index') ;

    }

    public function destroy($id)  
    {  
        $deletepost=post::find($id)->delete();
        return redirect()->route('posts.index') ;

    } 
    

    public function search(Request $req)
    {
        $data= user::
        where('name' ,'like' , '%'.$req->input('query').'%')->get();
        return view('search' , ['users'=>$data]);
    }


}
