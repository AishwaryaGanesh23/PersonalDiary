<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\post_media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 

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
        $posts = Post::OrderBy('created_at','desc')->get();
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
            'post_media' => 'nullable|max:2048'
        ]);

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->entrycontent =  $request->input('body');
        $post->save();

        //post media upload
        
        if($request->hasFile('post_media')){
              $files = $request->file('post_media');
            foreach( $files as $file)
              {
                $filenameorig =$file->getClientOriginalName();
                // $filename = pathinfo($filenameext, PATHINFO_FILENAME);
                // $ext = $file->getClientOriginalExtension();
                $filetype = substr($file->getMimeType(), 0, 5);
                $filenamestore = $post->user_id.'_'.$post->id.'_'.$filenameorig;
                // $path = $file->storeAs('public/post_media', $filenamestore); //stores in storage
                $path=$file->move(public_path('post_media'), $filenamestore);   //stores in public 
                    

                $postmedia = new post_media;
                $postmedia->user_id = Auth::user()->id;
                $postmedia->post_id = $post->id;
                $postmedia->filename = $filenamestore;
                $postmedia->filetype = $filetype;
                $postmedia->save();
            } 
        }
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
        

        $postmedia = post_media::where('post_id', $id)
                    ->get();

        return view('posts.show')->with('post',$post)->with('postmedia',$postmedia);
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
        $postmedia = post_media::where('post_id', $id)
                    ->get();

        return view('posts.edit')->with('post',$post)->with('postmedia',$postmedia);
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
            'post_media' => 'nullable|max:2048'
        ]);
        $post = Post::find($id);
        // $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->entrycontent =  $request->input('body');
        $post->save();

        if($request->hasFile('post_media')){
            $files = $request->file('post_media');
          foreach( $files as $file)
            {
              $filenameorig =$file->getClientOriginalName();
              // $filename = pathinfo($filenameext, PATHINFO_FILENAME);
              // $ext = $file->getClientOriginalExtension();
              $filetype = substr($file->getMimeType(), 0, 5);
              $filenamestore = $post->user_id.'_'.$post->id.'_'.$filenameorig;
              // $path = $file->storeAs('public/post_media', $filenamestore); //stores in storage
              $path=$file->move(public_path('post_media'), $filenamestore);   //stores in public 
                  

              $postmedia = new post_media;
              $postmedia->user_id = Auth::user()->id;
              $postmedia->post_id = $post->id;
              $postmedia->filename = $filenamestore;
              $postmedia->filetype = $filetype;
              $postmedia->save();
            }
        }
        return redirect('posts/'.$post->id)->with('success','Entry Updated');
        // return redirect('/posts')
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

        $postmedia = post_media::where('post_id', $id)
                    ->get();
        foreach($postmedia as $media)
        {
            File::delete('post_media/'.$media->filename);
        }
        $postmedia = post_media::where('post_id', $id)
                    ->delete();

        $post->delete();
        return redirect('/posts');
    }
    

    public function sortbyTitle()
    {
        $posts = Post::OrderBy('title','asc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    public function sortbyCreated()
    {
        $posts = Post::all();
         return view('posts.index')->with('posts',$posts);
    }
}
