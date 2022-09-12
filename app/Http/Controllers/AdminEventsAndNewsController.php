<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\EventAndNews;

class AdminEventsAndNewsController extends Controller
{
    public function index()
    {
        $eventAndNews = EventAndNews::all();
        return view('admin.eventsAndNews.index',compact('eventAndNews'));
    }

    public function create()
    {
        return view('admin.eventsAndNews.create');
    }

    
    public function store(Request $request){

       $checkType = $request->validate([
            'type' => 'required',
            'image' => 'required|image|max:2048',
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($checkType && $request->type === "News") {
           $file = $request->file('image');
           $destinationPath = 'images-upload';
           $newFileName = uniqid() . '_' . trim($file->getClientOriginalName());
           $file->move($destinationPath, $newFileName);
          
           EventAndNews::create([
             'type' => $request->type,
             'image' => $newFileName,
             'title' => $request->title,
             'description' =>$request->description,
             'fee' => 'null'
           ]);
           return redirect('admin/eventsAndNews')->with('success', 'saved successfully');
        }elseif ($checkType && $request->type === "Event") {
            $request->validate([
                'fee' => 'required'
            ]);
            $file = $request->file('image');
            $destinationPath = 'images-upload';
            $newFileName = uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($destinationPath, $newFileName);

            EventAndNews::create([
                'type' => $request->type,
                'image' => $newFileName,
                'title' => $request->title,
                'description' =>$request->description,
                'fee' => $request->fee
            ]);
            return redirect('admin/eventsAndNews')->with('success', 'saved successfully');
        }   
    }
    
    public function edit($id)
    {
        $eventAndNews = EventAndNews::find($id);
        return view('admin.eventsAndNews.edit',compact('eventAndNews'));
    }

    public function update(Request $request,$id)
    {
        $eventAndNews = EventAndNews::findOrFail($id);
        $checkType = $request->validate([
            'type' => 'required',
            'image' => 'required|image|max:2048',
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($checkType && $request->type === "News") {
           $file = $request->file('image');
           $destinationPath = 'images-upload';
           $newFileName = uniqid() . '_' . trim($file->getClientOriginalName());
           $file->move($destinationPath, $newFileName);
        
           $eventAndNews->update([
             'type' => $request->type,
             'image' => $newFileName,
             'title' => $request->title,
             'description' =>$request->description,
             'fee' => 'null'
           ]);
           return redirect('admin/eventsAndNews')->with('success', 'saved successfully');
        }elseif ($checkType && $request->type === "Event") {
            $request->validate([
                'fee' => 'required'
            ]);
            $file = $request->file('image');
            $destinationPath = 'images-upload';
            $newFileName = uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($destinationPath, $newFileName);

           $eventAndNews->update([
            'type' => $request->type,
            'image' => $newFileName,
            'title' => $request->title,
            'description' =>$request->description,
            'fee' => $request->fee
           ]);
            return redirect('admin/eventsAndNews')->with('success', 'saved successfully');
        }   
    }

    public function destroy($id)
    {
        $eventAndNews = EventAndNews::findOrFail($id)->delete();
        return redirect('admin/eventsAndNews');
    }
    
}
