<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $locale=Auth::user()->settings['locale'];
            App::setlocale($locale);
        }
        else if(session()->has('locale')) {
            App::setlocale(session()->get('locale'));
        }
        else{
            App::setlocale("en");
        }
        return $next($request);
    }
}
