<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAlevelQuestionsRequest;
use App\Http\Requests\UpdateAlevelQuestionsRequest;
use App\Models\QuizAlevel;
use App\Models\QuestionsAlevel;
use App\Models\ChoiceAlevel;

class QuestionAlevelController extends Controller
{
    public function create($quiz_id)
    {
        return view('admin.questions.alevel.create',compact('quiz_id'));
    }
    public function store(StoreAlevelQuestionsRequest $request, $quiz_id)
    {
        $quizAlevel = QuizAlevel::findOrFail($quiz_id);

        $questionsAlevel = $quizAlevel->questionsAlevel()->create([
            'question_name' => $request->question_name,
        ]); 

        $options = array();
        $options[1] = request()->option1;
        $options[2] = request()->option2;
        $options[3] = request()->option3;
        $options[4] = request()->option4;

        $is_correct = request()->is_correct;
        $correct = 0;
        foreach ($options as $option => $value) {
                if ($is_correct == $option) {
                    $correct = 1;
                }else {
                    $correct = 0;
                }
                ChoiceAlevel::create([
                   'questions_alevel_id' => $questionsAlevel->id,
                   'is_correct' => $correct,
                   'text' => $value
                ]);
            
        }
        
        return back();


    }

    public function edit($quiz_id, $question_id)
    {
        $quizAlevel = QuizAlevel::findOrFail($quiz_id)
        ->with(['questionsAlevel' => function ($query) use($question_id) {
            $query->with(['choiceAlevel' => function ($query) use($question_id) {}])
            ->where('id', $question_id)->take(1);
        }])->where('id',$quiz_id)
           ->first();

        return view('admin.questions.alevel.edit',compact('quizAlevel'));

    }

    public function update(UpdateAlevelQuestionsRequest $request, $quiz_id, $question_id)
    {
        $quiz_id = QuizAlevel::findOrFail($quiz_id)
        ->questionsAlevel()->where('id', $question_id)
        ->update([
            'question_name' => $request->question_name
        ]);

        ChoiceAlevel::where('questions_alevel_id',$question_id)->delete();
        
        $options = array();
        $is_correct = request()->is_correct;
        $options[1] = request()->option1;
        $options[2] = request()->option2;
        $options[3] = request()->option3;
        $options[4] = request()->option4;

        foreach ($options as $option => $value) {
                if ($is_correct == $option) {
                    $correct = 1;
                }else {
                    $correct = 0;
                }
                ChoiceAlevel::create([
                   'questions_alevel_id' => $question_id,
                   'is_correct' => $correct,
                   'text' => $value
                ]);
            
        }
        
        return view('admin.quiz.alevel.index');
    }

    public function idestroy($id)
    {
        dd("ya");
        QuestionsAlevel::where('id',$id)->delete();
        ChoiceAlevel::where('questions_olevel_id',$id)->delete();
        return view('admin.quiz.alevel.index');
    }
}
