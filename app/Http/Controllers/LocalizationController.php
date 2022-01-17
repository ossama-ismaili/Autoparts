<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        $array=["en","fr"];
        if(in_array($locale, $array))
        {
            if(Auth::check())
            {
                User::where("id",Auth::user()->id)
                ->update(["settings"=>json_encode(["locale"=>$locale])]);
            }
            App::setlocale($locale);
            session()->put('locale', $locale);
            return back();
        }
        else
        {
            abort(404);
        }
    }
}
