<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizAlevel;
use App\Models\ChoiceOlevel;
use App\Models\QuestionsOlevel;
use Illuminate\Support\Facades\Validator;

class QuizAlevelController extends Controller
{
    public function index()
    {
        $quizAlevel = QuizAlevel::all();
        return view('admin.quiz.alevel.index');
    }

    public function fetch()
    {
        $quizAlevel = QuizAlevel::all();
        return response()->json([
            'quizAlevel'  => $quizAlevel
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'subject' => 'required',
            'name' => 'required',
            'description' => 'required',
            'time' => 'required',
            'active' => 'required'
        ]);

        
        if ($validator->fails()) {
            return response()->json([
                'status'  =>404,
                'errors' =>$validator->errors(),
            ]);
        } else {
            QuizAlevel::create($request->all());
            return response()->json([
                'status'  =>200,
                'message' =>'Quiz added Successfully.',
            ]);
        }
    }
    public function show($id)
    {  
        $quizAlevel = QuizAlevel::findOrFail($id)->with(['questionsAlevel' => function ($query) {
            $query->with(['choiceAlevel' => function ($query) {}]);
        }])
        ->where('id',$id)
        ->get();

        return view('admin.questions.alevel.index',compact('quizAlevel'));
    }

    public function edit($id)
    {
        $quizAlevel = QuizAlevel::find($id);
        if ($quizAlevel === null) {
            return response()->json([
                'status'  =>404,
                'message' =>'Quiz not found',
            ]);
        } else {
            return response()->json([
                'status'  =>200,
                'quizAlevel'  => $quizAlevel
            ]);
        }
        
    }

    public function update(Request $request, $id)
    {
        $quizAlevel = QuizAlevel::find($id);
        $validator = Validator::make($request->all(),[
            'subject' => 'required',
            'name' => 'required',
            'description' => 'required',
            'time' => 'required',
            'active' => 'required',
        ]);

        
        if ($validator->fails()) {
            return response()->json([
                'status'  =>404,
                'errors' =>$validator->errors(),
            ]);
        }
         else if($quizAlevel == null){
            return response()->json([
                'status'  =>400,
                'message' =>'Quiz not found',
            ]);
         } else {
            $quizAlevel->update($request->all());
            return response()->json([
                'status'  =>200,
                'message' =>'Updated Successfully.',
            ]);
        }
    }
    public function destroy($id)
    {
        $quizAlevel = quizAlevel::find($id);
        if($quizAlevel === null){
            return response()->json([
                'status'  =>400,
                'message' =>'Quiz not found',
            ]);
         } else {
            $quizAlevel->delete();
            return response()->json([
                'status'  =>200,
                'message' =>'Deleted Successfully.',
            ]);
        }
    }

    
}
