<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        return view('contact.table',compact('contacts'));
    }
    
    public function store(Request $request) {
        // dd($request);
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $email = $request->email;
        $message = $request->message;
        // validation
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        // store in db
        Contact::create([
          //limktob f lfo9 dyal table
            'name' =>$name,
            'address' =>$address,
            'email' =>$email,
            'phone' =>$phone,
            'message' =>$message,
        ]);
        return redirect('/admin/category/store');
    }
}
