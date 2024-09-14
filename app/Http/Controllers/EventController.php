<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function showOverview($id)
    {
        $events = event::all();
        $event = Event::find($id); // Fetch all blogs from the database
        return view('event_overview', compact('event','events')); // Pass products to the view
    }
    public function show(){
        $events = event::all();
        return view('Event',[
            'events'=>$events
        ]);
    }
    public function index(){
        $events = Event::all();
        return view('events.table',[
            'events'=>$events
        ]);
    }
    //show form
    public function create(){
        $events = Event::all();
        return view('events.create',[
            'events'=>$events
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
            $request->file(key:'image')->storeAs('event',$image,'public');
        }
        // store in db
        Event::create([
          //limktob f lfo9 dyal table
          'title' => $request->title,
          'image' => $image,
          'date' => $request->date,
          'description' => $request->description,
          'author' => $request->author,
        ]);
        return redirect('/admin/events');
    }

    public function destroy($id){
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('events.index')->with('success','event deleted successfully');
    }
//show form
//edit needs an id bach to show     create doesn't need id
    public function edit($id){
        $event = Event::find($id);
        $events = Event::all();
        return view('events.update',[
            'event'=>$event,
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
        $event = Event::find($id);
        $event->update([
          //limktob f lfo9 dyal table
          'titledateauthor' => $request->titledateauthor,
          'dateauthor' => $request->dateauthor,
          'description' => $request->description,
          'author' => $request->author,
        ]);
        if($request->hasFile(key:'image')){
            $image = $request->file('image')->getClientOriginalName();
            $request->file(key:'image')->storeAs('event',$image,'public');
            $event->update([
                'image' => $image,
              ]);
        }

        return redirect('/admin/events');
    }
    
}