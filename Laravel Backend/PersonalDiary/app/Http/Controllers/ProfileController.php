<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use Auth, Hash;
class ProfileController extends Controller
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
        return redirect()->route('profile.index');
        // return view('profile.showprofile');
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
        return redirect()->route('profile.index');
        // return view('profile.showprofile');
    }


    public function changePasswordForm()
    {
        return view('profile.changepassword');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
          'current_password' => 'required',
          'password' => 'required|string|min:8|confirmed',
          'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('profile.index')->with('error', 'Current password does not match!');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Password successfully changed!');
    }
}
