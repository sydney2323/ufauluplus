<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotesAlevel;

class UserNotesAlevelController extends Controller
{
    public function show($subject)
    {
        $subjectTitle = $subject;
        $subjects = NotesAlevel::where('subject',$subject)->where('status',1)->get();
        
        return view('client.notes',compact('subjectTitle','subjects'));
    }
    
    public function showSpecificTopic($subject,$topicSlug)
    {
        $notes = NotesAlevel::where('slug',$topicSlug)->where('status',1)->first() ?? abort(404);
        
        return view('client.notes_single',compact('notes'));
    }

    public function showNotesAtWelcome($subject)
    {
        $subjects = NotesAlevel::where('subject',$subject)->where('status',1)->get();
        if($subjects->isEmpty()){
           if ($subject == "Mathematics" || 
                $subject == "Physics" ||
                $subject == "Chemistry" ||
                $subject == "Biology" || 
                $subject == "Geography") {
                  //  dd("yea");
                  return view('topic_list',compact('subjects','subject'));
           } else {
            return back();
           }
            
        }
        return view('topic_list',compact('subjects'));
    }

    
}

// $satellite = DB::table('satellites')->where('norad_cat_id', $norad_cat_id)->first();
//     if( ! satellite){
//         return abort(404);
//     }



