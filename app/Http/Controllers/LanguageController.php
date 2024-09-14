<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller{
    public function setLanguage($locale){
            Session::put('locale',$locale);//memory of the browser remmember the last language you used 
            App::setLocale($locale);
            return redirect()->back();
    }
}