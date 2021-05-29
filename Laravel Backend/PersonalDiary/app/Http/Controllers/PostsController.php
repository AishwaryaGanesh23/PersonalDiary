<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all posts page
        $posts = Post::all();
         return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this -> validate($request,[
            'title'=>'required',
            'body'=>'required',
        ]);

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->entrycontent =  $request->input('body');
        $post->save();

        return redirect('/posts');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if($post->user_id !== Auth::user()->id)
        {
            return redirect('/posts')->with('error','Unauthorized');
        }
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        if($post->user_id !== Auth::user()->id)
        {
            return redirect('/posts')->with('error','Unauthorized');
        }
        
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this -> validate($request,[
            'title'=>'required',
            'body'=>'required',
        ]);

        $post = Post::find($id);
        // $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->entrycontent =  $request->input('body');
        $post->save();

        return redirect('/posts')->with('success','Entry Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post->user_id !== Auth::user()->id)
        {
            return redirect('/posts')->with('error','Unauthorized');
        }
        
        $post->delete();
        return redirect('/posts');
    }

    public function sortbyTitle()
    {
        $posts = Post::OrderBy('title','asc')->get();
        return view('posts.index')->with('posts',$posts);
    }
}
