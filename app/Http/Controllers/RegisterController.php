<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('register',compact('categories'));
    }
    
    public function store(Request $request) {
        // dd($request);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        // validation
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        // store in db
        User::create([
          //limktob f lfo9 dyal table
            'name' =>$name,
            'email' =>$email,
            'password' =>Hash::make($password),
        ]);
        return redirect('/register-form');
    }
}
