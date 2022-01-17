<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $user=Auth::user();
            return view('pages.profile')->with('user',$user);
        }
        else
        {
            abort(401);
        }
    }

    public function edit(Request $request)
    {
        $user=User::where('id',Auth::user()->id);
        if(isset($request->user_data))
        {
            $user->update($request->user_data);
        }
        return response()->json(['success'=>'done']);
    }

    public function edit_avatar(Request $request)
    {
        if(isset($request->avatar))
        {
            $avatar=request()->file('avatar')->getClientOriginalName();
            $file_name=md5(time()).$avatar;
            $file_path='users/'.date('FY').'/';
            request()->file('avatar')->storeAs('public/'.$file_path,$file_name,'');
            User::where('id', Auth::user()->id)->update(['avatar'=>$file_path.$file_name]);
            return redirect('/');
        }
        else
        {
            abort(400);
        }
    }
}
