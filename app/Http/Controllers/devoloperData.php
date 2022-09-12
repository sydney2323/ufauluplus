<?php
        // $quizOlevel = QuizOlevel::find($id);
        // $data = QuizOlevel::find($id)->questionOlevel;
        // return view('admin.questions.index',compact('data','quizOlevel'));

        // $quizOlevel = QuizOlevel::findOrFail($id);
        // $quizOlevel = $quizOlevel->questionsOlevel;
        // $choiceOlevel = QuizOlevel::findOrFail($id)->choiceOlevel;
        //return view('admin.questions.index',compact('quizOlevel'));

        // $quizOlevel = QuizOlevel::findOrFail($id);
        // $questionsOlevels = QuestionsOlevel::where('quiz_olevel_id', $quizOlevel->id)->get();
        // $questionsOlevel = QuestionsOlevel::findOrFail(79)->choiceOlevel;

        // $quiz_id = QuizOlevel::findOrFail($quiz_id);

        // $data = request()->validate([
        //     'question_name' => 'required'   
        // ]);
        // $quiz_id->questionsOlevel()->create($data); 

        // $questionsOlevel = QuestionsOlevel::latest()->first();
        // $data2 = request()->validate([
        //     'option1' => 'required',
        //     'option2' => 'required',
        //     'option3' => 'required',
        //     'option4' => 'required',
        //     'is_correct' => 'required'    
        // ]);
        // $options = array();
        // $is_correct = request()->is_correct;
        // $options[1] = request()->option1;
        // $options[2] = request()->option2;
        // $options[3] = request()->option3;
        // $options[4] = request()->option4;

        // foreach ($options as $option => $value) {
        //         if ($is_correct == $option) {
        //             $correct = 1;
        //         }else {
        //             $correct = 0;
        //         }
        //         ChoiceOlevel::create([
        //            'questions_olevel_id' => $questionsOlevel->id,
        //            'is_correct' => $correct,
        //            'text' => $value
        //         ]);
            
        // }
        
        // return back();


        // in a single line here
$values = Cart::where('session_id', $id)->update(['data'=>$data]);