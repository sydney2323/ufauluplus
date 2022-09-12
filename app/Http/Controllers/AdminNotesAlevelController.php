<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotesAlevel;
use Illuminate\Support\Str;

class AdminNotesAlevelController extends Controller
{
    
    public function index()
    {
        $notesAlevels = NotesAlevel::all();
        return view('admin/a_level_notes',compact('notesAlevels'));
    }

    public function create()
    {
        return view('admin.a_post_notes');
    }

    public function store()
    {
        NotesAlevel::create(request()->validate([
            'subject' => 'required',
            'topic' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]));

        return redirect('/admin/a/notes');
    }

    public function edit(NotesAlevel $notesAlevel)
    {
        return view('admin/a_edit_notes',compact('notesAlevel'));
    }

    public function update(NotesAlevel $notesAlevel)
    {
        $notesAlevel->update(request()->validate([
            'subject' => 'required',
            'topic' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]));
        return redirect('/admin/a/notes');
    }

    public function destroy(NotesAlevel $notesAlevel)
    {
        $notesAlevel->delete();
        return redirect('/admin/a/notes');
    }
}
