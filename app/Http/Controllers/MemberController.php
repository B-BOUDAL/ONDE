<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{

    public function show(){
        $members = member::all();
        return view('Member',[
            'members'=>$members
        ]);
    }
    public function index(){
        $members = Member::all();
        return view('members.table',[
            'members'=>$members
        ]);
    }
    //show form
    public function create(){
        $members = Member::all();
        return view('members.create',[
            'members'=>$members
        ]);
    }
    // change data
    public function store(Request $request){
        $fullname = $request->fullname    ;
        $role = $request->role;
       
        // validation
        $request->validate([
            'fullname'=>'required',
        ]);
        // $this->image($request);
        if($request->hasFile(key:'image')){
            $request->file(key:'image')->storeAs('member',$image,'public');
        }
        // store in db
        Member::create([
          //limktob f lfo9 dyal table
          'fullname' => $request->fullname,
          'role' => $request->role,
       
        ]);
        return redirect('/admin/members');
    }

    public function destroy($id){
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('members.index')->with('success','member deleted successfully');
    }
//show form
//edit needs an id bach to show     create doesn't need id
    public function edit($id){
        $member = Member::find($id);
        $members = Member::all();
        return view('members.update',[
            'member'=>$member,
        ]);
    }

    // change data
    //edit -----------------------------------------
    public function update(Request $request){
        $id = $request->id;
        $fullname = $request->fullname;
        $role = $request->role;

        // validation
        $request->validate([
            'fullname'=>'required', 
        ]);
       
        // store in db
        $member = Member::find($id);
        $member->update([
          //limktob f lfo9 dyal table
          'fullname' => $request->fullname,
          'role' => $request->role,
        
        ]);
        if($request->hasFile(key:'image')){
            $image = $request->file('image')->getClientOriginalName();
            $request->file(key:'image')->storeAs('member',$image,'public');
            $member->update([
                'image' => $image,
              ]);
        }

        return redirect('/admin/members');
    }
    
}