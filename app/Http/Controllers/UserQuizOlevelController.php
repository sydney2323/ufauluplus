<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizOlevel;
use App\Models\QuestionsOlevel;
use App\Models\UserChoiceOlevel;
use App\Models\ResultsOlevel;
use Session;

use Illuminate\Support\Arr;

class UserQuizOlevelController extends Controller
{
    
    public function index()
    {
        return view('client.quiz');
    }

    public function show($subject)
    {
        $quizOlevels = QuizOlevel::where('subject',$subject)->paginate(5);
        return view('client.show',compact('quizOlevels','subject'));   

    }

    public function takeQuiz($subject, $quiz_id)
    {
        // $quizOlevel = QuizOlevel::findOrFail($quiz_id)->with(['questionsOlevel' => function ($query) {
        //     $query->with(['choiceOlevel' => function ($query) {}]);
        // }])
        // ->whereHas('questionsOlevel')
        // ->get();

        $quizOlevel = QuizOlevel::find($quiz_id);

        return view('client.take',compact('quizOlevel')); 
    }

    public function loadQuestion(Request $request, $quiz_id)
    {
        $question_id = $request->question_id;
        $button_type = $request->button_type;

        $totalRecords = QuestionsOlevel::where('id', request()->question_id)
        ->where('id', request()->question_id);
        
        if ($question_id == null && $button_type == null) {
            $quizOlevel = QuizOlevel::findOrFail($quiz_id)->with(['questionsOlevel' => function ($query) {
                $query->with(['choiceOlevel' => function ($query) {}])->first();
            }])->where('id',$quiz_id)
               ->first();
            
            $quizOlevel = compact('quizOlevel');
            return response()->json([
                'question' => $quizOlevel
            ]);
        } else if ($button_type === 'next') { 
            $quizOlevel = QuizOlevel::findOrFail($quiz_id)
            ->with(['questionsOlevel' => function ($query) {
                $query->with(['choiceOlevel' => function ($query) { }])
                ->where('id','>',request()->question_id)->take(1);
            }])->where('id',$quiz_id)
               ->first();

            $quizOlevel = compact('quizOlevel');
            return response()->json([
                'question' => $quizOlevel,
                'status'   => 201
            ]);

          
        } else if ($button_type === 'previous') { 
            $quizOlevel = QuizOlevel::findOrFail($quiz_id)
            ->with(['questionsOlevel' => function ($query) {  
                $query->with(['choiceOlevel' => function ($query) {}])
                ->where('id','<',request()->question_id)->orderBy('id','desc')->take(1);
            }])->where('id',$quiz_id)
               ->first();

            $quizOlevel = compact('quizOlevel');
            return response()->json([
                'question' => $quizOlevel,
                'status'   => 202
            ]);

        }
        
        
    }

    public function userChoice(Request $request)
    {
        $userChoice = request()->validate([
            'question_id' => 'required',
            'quiz_id' => 'required',
            'user_id' => 'required'
        ]);

        if (request()->choice_id == null) {
            $userChoice = UserChoiceOlevel::where('user_id', request()->user_id)
            ->where('quiz_id',request()->quiz_id)
            ->where('question_id',request()->question_id)->get();
            if ($userChoice->isEmpty()) {
                 //user has not made a choice
                return response()->json([
                    'status' => 400
                ]);
                
            }else {
                 //user has made a choice
                return response()->json([
                    'status' => 200,
                ]);
            }
        }else {
             //user has made a choice and we are updating or creating
            $userChoice = UserChoiceOlevel::updateOrCreate(
                [
                    'user_id'    => request('user_id'),
                    'question_id'    => request('question_id'),
                ],
                [
                    'user_id'    => request('user_id'),
                    'question_id'    => request('question_id'),
                    'quiz_id'    => request('quiz_id'),
                    'choice_id'    => request('choice_id'),
                ]
            );
            return response()->json([
                'status' => 200,
            ]);
        }
        
    }

    public function viewSingleResult(Request $request)
    {
        $resultsOlevel = ResultsOlevel::find($request->result_id);
        if ($resultsOlevel == "") {
            return response()->json([
                'data' => 400
            ]);
        } else {
           return response()->json([
            'data' => $resultsOlevel
        ]);
        }
        
    }

    public function results($quiz_id)
    {
       $user_id = Session::get('user')->id;
       $total_marks = 0;

       $total_questions = QuestionsOlevel::join('quiz_olevels', 'questions_olevels.quiz_olevel_id', '=', 'quiz_olevels.id')
       ->where('quiz_olevels.id',$quiz_id)->count();
    
       $resultsOlevels = UserChoiceOlevel::join('choice_olevels', 'user_choice_olevels.choice_id', '=', 'choice_olevels.id')
        ->where('user_id',$user_id)->get();
        //dd(compact('resultsOlevels'));
        foreach ($resultsOlevels as $key => $resultsOlevel) {
            if ($resultsOlevel->is_correct == 1) {
               $total_marks = $total_marks + 1;
            }
        }
        ResultsOlevel::updateOrCreate(
            [
                'quiz_id'    => $quiz_id,
            ],
            [
                'quiz_id'    => $quiz_id,
                'user_id' => $user_id,
                'total_marks' => $total_marks,
                'total_questions' => $total_questions
            ]
         );

         $fetchUserQuizs = QuizOlevel::join('results_olevels', 'quiz_olevels.id', '=', 'results_olevels.quiz_id')
         ->where('user_id',$user_id)->get();
         //dd( $fetchUserQuizs);
         return view('client.results',compact('fetchUserQuizs'));
    }
}
