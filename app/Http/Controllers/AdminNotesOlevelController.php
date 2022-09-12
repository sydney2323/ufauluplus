<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotesOlevel;

class AdminNotesOlevelController extends Controller
{
    //
    public function index()
    {
        $notesOlevels = NotesOlevel::all();
        return view('admin/o_level_notes',compact('notesOlevels'));
    }

    public function create()
    {
        return view('admin.o_post_notes');
    }

    public function store()
    {
        NotesOlevel::create(request()->validate([
            'subject' => 'required',
            'topic' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]));

        return redirect('/admin/o/notes');
    }

    public function edit(NotesOlevel $notesOlevel)
    {
        return view('admin/o_edit_notes',compact('notesOlevel'));
    }

    public function update(NotesOlevel $notesOlevel)
    {
        $notesOlevel->update(request()->validate([
            'subject' => 'required',
            'topic' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]));
        return redirect('/admin/o/notes');
    }

    public function destroy(NotesOlevel $notesOlevel)
    {
        $notesOlevel->delete();
        return redirect('/admin/o/notes');
    }
}
