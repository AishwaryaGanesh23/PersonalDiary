<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('profile.showprofile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            
            'profile_pic' => 'nullable|max:2048|image'
        ]);
        $user = User::find($id);

        if($request->hasFile('profile_pic'))
        {
            // check if previous pic exists
            if($user->profile_pic != null)
            {
               File::delete('profile_pic/'.$user->profile_pic);
            }
            $file = $request->file('profile_pic');
            $filenameorig =$file->getClientOriginalName();
            // $filename = pathinfo($filenameext, PATHINFO_FILENAME);
            // $ext = $file->getClientOriginalExtension();
            //$filetype = substr($file->getMimeType(), 0, 5);
            $filenamestore = $user->id.'_'.$filenameorig;
            // $path = $file->storeAs('public/post_media', $filenamestore); //stores in storage
            $path=$file->move(public_path('profile_pic'), $filenamestore);   //stores in public 
            $user->profile_pic = $filenamestore;
            $user->save();
        }
        return view('profile.showprofile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user =  User::find($id);
        // $post_id = $postmedia->post_id;
        File::delete('profile_pic/'.$user->profile_pic);
        $user->profile_pic = null;
        $user->save();
        return view('profile.showprofile');
    }
}