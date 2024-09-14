<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function showOverview($id)
    {
        $blogs = blog::all();
        $blog = Blog::find($id); // Fetch all blogs from the database
        // Log::info($blog->date);
        return view('blog_overview', compact('blog','blogs')); // Pass products to the view
    }

    public function show(){
        $blogs = blog::all();
        return view('Blog',[
            'blogs'=>$blogs
        ]);
    }

    public function index(){
        $blogs = blog::all();
        return view('blogs.table',[
            'blogs'=>$blogs
        ]);
    }
    //show form
    public function create(){
        $blogs = blog::all();
        return view('blogs.create',[
            'blogs'=>$blogs
        ]);
    }
    // change data
    public function store(Request $request){
        $title = $request->title    ;
        $image = $request->file('image')->getClientOriginalName();
        $date = $request->date;
        $description = $request->description;
        $author = $request->author;
        // validation
        $request->validate([
            'title'=>'required',
        ]);
        // $this->image($request);
        if($request->hasFile(key:'image')){
            $request->file(key:'image')->storeAs('blog',$image,'public');
        }
        // store in db
        Blog::create([
          //limktob f lfo9 dyal table
          'title' => $request->title,
          'image' => $image,
          'date' => $request->date,
          'description' => $request->description,
          'author' => $request->author,
        ]);
        return redirect('/admin/blogs');
    }

    public function destroy($id){
        $blog = blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success','blog deleted successfully');
    }
//show form
//edit needs an id bach to show     create doesn't need id
    public function edit($id){
        $blog = blog::find($id);
        $blogs = blog::all();
        return view('blogs.update',[
            'blog'=>$blog,
        ]);
    }

    // change data
    //edit -----------------------------------------
    public function update(Request $request){
        $id = $request->id;
        $title = $request->title;
        
        $date = $request->date;
        $description = $request->description;
        $author = $request->author;
        // validation
        $request->validate([
            'title'=>'required', 
        ]);
        // $this->image($request);
       
        // store in db
        $blog = blog::find($id);
        $blog->update([
          //limktob f lfo9 dyal table
          'title' => $request->title,
          'date' => $request->date,
          'description' => $request->description,
          'author' => $request->author,
        ]);
        if($request->hasFile(key:'image')){
            $image = $request->file('image')->getClientOriginalName();
            $request->file(key:'image')->storeAs('blog',$image,'public');
            $blog->update([
                'image' => $image,
              ]);
        }

        return redirect('/admin/blogs');
    }
  
    
}