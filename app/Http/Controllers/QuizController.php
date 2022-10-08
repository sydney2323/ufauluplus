<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizOlevel;
use App\Models\ChoiceOlevel;
use App\Models\QuestionsOlevel;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    public function index()
    {
        $quizOlevel = QuizOlevel::all();
        return view('admin.quiz.index');
    }

    public function fetch()
    {
        $quizOlevel = QuizOlevel::all();
        return response()->json([
            'quizOlevel'  => $quizOlevel
        ]);
    }
    public function store(Request $request)
    {
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
        } else {
            QuizOlevel::create($request->all());
            return response()->json([
                'status'  =>200,
                'message' =>'Quiz added Successfully.',
            ]);
        }
    }
    public function show($id)
    {  

        $quizOlevel = QuizOlevel::findOrFail($id)->with(['questionsOlevel' => function ($query) {
            $query->with(['choiceOlevel' => function ($query) {}]);
        }])
        ->where('id',$id)
        ->get();

        return view('admin.questions.index',compact('quizOlevel'));
    }

    public function edit($id)
    {
        $quizOlevel = QuizOlevel::find($id);
        if ($quizOlevel === null) {
            return response()->json([
                'status'  =>404,
                'message' =>'Quiz not found',
            ]);
        } else {
            return response()->json([
                'status'  =>200,
                'quizOlevel'  => $quizOlevel
            ]);
        }
        
    }

    public function update(Request $request, $id)
    {
        $quizOlevel = QuizOlevel::find($id);
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
         else if($quizOlevel == null){
            return response()->json([
                'status'  =>400,
                'message' =>'Quiz not found',
            ]);
         } else {
            $quizOlevel->update($request->all());
            return response()->json([
                'status'  =>200,
                'message' =>'Updated Successfully.',
            ]);
        }
    }

    public function destroy($id)
    {
        
        $quizOlevel = QuizOlevel::find($id);
        $quizOlevel->questionsOlevel()->delete();
       
        if($quizOlevel === null){
            return response()->json([
                'status'  =>400,
                'message' =>'Quiz not found',
            ]);
         } else {
            $quizOlevel->delete();
            return response()->json([
                'status'  =>200,
                'message' =>'Deleted Successfully.',
            ]);
        }
    }
}
