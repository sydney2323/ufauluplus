<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotesOlevel;

class UserNotesOlevelController extends Controller
{
    public function show($subject)
    {
        $subjectTitle = $subject;
        $subjects = NotesOlevel::where('subject',$subject)->get();
        
        return view('client.notes',compact('subjectTitle','subjects'));
    }

    public function showSpecificTopic($subject,$topicSlug)
    {
        $notes = NotesOlevel::where('slug',$topicSlug)->first() ?? abort(404);
        
        return view('client.notes_single',compact('notes'));
    }

    public function showNotesAtWelcome($subject)
    {
        $subjects = NotesOlevel::where('subject',$subject)->get();
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
