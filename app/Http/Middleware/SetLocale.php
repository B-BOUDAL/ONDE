<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('locale')!=null){
            App::setlocale(session()->get('locale'));
        }else{     
            Session::put('locale','fr');//memory of the browser remmember the last language you used 
            App::setLocale(Session::get("locale"));}
        return $next($request);
    }
}
