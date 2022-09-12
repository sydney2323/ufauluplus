<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventAndNews;
use App\Models\UserFeedback;

class WelcomeController extends Controller
{
    public function welcome(){

        $events = EventAndNews::where('type','Event')->get();
        $news = EventAndNews::where('type','News')->get();

        return view('welcome',compact('events','news')); 
    }

    public function eventView($id){

        $event= EventAndNews::findOrFail($id);
        $eventsList = EventAndNews::where('type','Event')->get();

        return view('events',compact('event','eventsList')); 
    }

    public function newsView($id){

        $news= EventAndNews::findOrFail($id);
        $newsList = EventAndNews::where('type','News')->get();

        return view('news',compact('news','newsList')); 
    } 
    public function userFeedbackForm(Request $request){
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        UserFeedback::create([
            'name' => request()->name,
            'email' => request()->email,
            'message' => request()->message,
            'admin_id' => 0,
            'read_status' => 0
        ]);
        return back()->with('success','Your message is received '.request()->name.'. We shall contact you soon.');
    }     
}