<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizAlevel;
use App\Models\QuestionsAlevel;
use App\Models\UserChoiceAlevel;
use App\Models\ResultsAlevel;
use Session;

use Illuminate\Support\Arr;

class UserQuizAlevelController extends Controller
{
    
    public function index()
    {
        return view('client.quiz');
    }

    public function show($subject)
    {
        $quizAlevels = QuizAlevel::where('subject',$subject)->where('active',true)->paginate(5);
        return view('client.quiz_alevel.show',compact('quizAlevels','subject'));   

    }

    public function takeQuiz($subject, $quiz_id)
    {
        // $quizAlevel = QuizAlevel::findOrFail($quiz_id)->with(['questionsAlevel' => function ($query) {
        //     $query->with(['choiceAlevel' => function ($query) {}]);
        // }])
        // ->whereHas('questionsAlevel')
        // ->get();

        $quizAlevel = QuizAlevel::find($quiz_id);

        return view('client.quiz_alevel.take',compact('quizAlevel'));
    }

    public function loadQuestion(Request $request, $quiz_id)
    {
        $question_id = $request->question_id;
        $button_type = $request->button_type;

        $totalRecords = QuestionsAlevel::where('id', request()->question_id)
        ->where('id', request()->question_id);
        
        if ($question_id == null && $button_type == null) {
            $quizAlevel = QuizAlevel::findOrFail($quiz_id)->with(['questionsAlevel' => function ($query) {
                $query->with(['choiceAlevel' => function ($query) {}])->first();
            }])->where('id',$quiz_id)
               ->first();
            
            $quizAlevel = compact('quizAlevel');
            return response()->json([
                'question' => $quizAlevel
            ]);
        } else if ($button_type === 'next') { 
            $quizAlevel = QuizAlevel::findOrFail($quiz_id)
            ->with(['questionsAlevel' => function ($query) {
                $query->with(['choiceAlevel' => function ($query) { }])
                ->where('id','>',request()->question_id)->take(1);
            }])->where('id',$quiz_id)
               ->first();

            $quizAlevel = compact('quizAlevel');
            return response()->json([
                'question' => $quizAlevel,
                'status'   => 201
            ]);

          
        } else if ($button_type === 'previous') { 
            $quizAlevel = QuizAlevel::findOrFail($quiz_id)
            ->with(['questionsAlevel' => function ($query) {  
                $query->with(['choiceAlevel' => function ($query) {}])
                ->where('id','<',request()->question_id)->orderBy('id','desc')->take(1);
            }])->where('id',$quiz_id)
               ->first();

            $quizAlevel = compact('quizAlevel');
            return response()->json([
                'question' => $quizAlevel,
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
            $userChoice = UserChoiceAlevel::where('user_id', request()->user_id)
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
            $userChoice = UserChoiceAlevel::updateOrCreate(
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
        $resultsAlevel = ResultsAlevel::find($request->result_id);
        if ($resultsAlevel == "") {
            return response()->json([
                'data' => 400
            ]);
        } else {
           return response()->json([
            'data' => $resultsAlevel
        ]);
        }
        
    }

    public function results($quiz_id)
    {
       $user_id = Session::get('user')->id;
       $total_marks = 0;

       $total_questions = QuestionsAlevel::join('quiz_alevels', 'questions_alevels.quiz_alevel_id', '=', 'quiz_alevels.id')
       ->where('quiz_alevels.id',$quiz_id)->count();
    
       $resultsAlevels = UserChoiceAlevel::join('choice_alevels', 'user_choice_alevels.choice_id', '=', 'choice_alevels.id')
        ->where('user_id',$user_id)->get();
        //dd(compact('resultsAlevels'));
        foreach ($resultsAlevels as $key => $resultsAlevel) {
            if ($resultsAlevel->is_correct == 1) {
               $total_marks = $total_marks + 1;
            }
        }
        ResultsAlevel::updateOrCreate(
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

         $fetchUserQuizs = QuizAlevel::join('results_alevels', 'quiz_alevels.id', '=', 'results_alevels.quiz_id')
         ->where('user_id',$user_id)->get();
         //dd( $fetchUserQuizs);
         return view('client.results',compact('fetchUserQuizs'));
    }
}
