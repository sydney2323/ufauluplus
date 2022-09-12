<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOlevelQuestionsRequest;
use App\Http\Requests\UpdateOlevelQuestionsRequest;
use App\Models\QuizOlevel;
use App\Models\QuestionsOlevel;
use App\Models\OptionOlevel;
use App\Models\ChoiceOlevel;
use PDF;

class QuestionOlevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('admin.questions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quiz_id)
    {
        return view('admin.questions.create',compact('quiz_id'));
    }

    /**
     * Store a newly created resource i storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOlevelQuestionsRequest $request, $quiz_id)
    {
        $quizOlevel = QuizOlevel::findOrFail($quiz_id);

        $questionsOlevel = $quizOlevel->questionsOlevel()->create([
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
                ChoiceOlevel::create([
                   'questions_olevel_id' => $questionsOlevel->id,
                   'is_correct' => $correct,
                   'text' => $value
                ]);
            
        }
        
        return back();

        // $quizOlevel = new QuizOlevel();
        // $quizOlevel->email = Input::get('email');
        // $quizOlevel->password = Input::get('password');
    
    
        // $questionsOlevel = new QuestionsOlevel();
        // $questionsOlevel->name = Input::get('questionsOlevel_name');
    
        // $questionsOlevel->users()->save($user);
        // $user->push();
        // return "User Saved";


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       // dd("yes");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id, $question_id)
    {
        
       
        
        $quizOlevel = QuizOlevel::findOrFail($quiz_id)
        ->with(['questionsOlevel' => function ($query) use($question_id) {
            $query->with(['choiceOlevel' => function ($query) use($question_id) {}])
            ->where('id', $question_id)->take(1);
        }])->where('id',$quiz_id)
           ->first();
          
          //dd(compact('quizOlevel'));
        return view('admin.questions.edit',compact('quizOlevel'));

        // $data = [
        //     'title' => 'Welcome to Tutsmake.com',
        //     'date' => date('m/d/Y')
        // ];
          
        // $pdf = PDF::loadView('admin.questions.pdf')->setOptions(['defaultFont' => 'sans-serif']);
        // $pdf->render();
        // return $pdf->stream('tutsmake.pdf');
       // return $pdf->download('tutsmake.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOlevelQuestionsRequest $request, $quiz_id, $question_id)
    {
        $quiz_id = QuizOlevel::findOrFail($quiz_id)
        ->questionsOlevel()->where('id', $question_id)
        ->update([
            'question_name' => $request->question_name
        ]);

        ChoiceOlevel::where('questions_olevel_id',$question_id)->delete();
        
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
                ChoiceOlevel::create([
                   'questions_olevel_id' => $question_id,
                   'is_correct' => $correct,
                   'text' => $value
                ]);
            
        }
        
        return view('admin.quiz.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        QuestionsOlevel::where('id',$id)->delete();
        ChoiceOlevel::where('questions_olevel_id',$id)->delete();
        return view('admin.quiz.index');
    }
}
// $head = Goodsreceiveheader::findorNew($request->id);
// $head->referencenumber=$request->referencenumber;
// $head->vendorid=$request->vendorid;
// $head->date=$request->date;
// $head->createdby=$request->createdby;
// if ($head->save()){
//     $id = $head->id;
//     foreach($request->itemid as $key =>$item_id){
//         $data = array(
//                         'goodsreceiveheader_id'=>$id,
//                         'itemid'=>$request->itemid [$key],
//                         'quantity'=>$request->quantity [$key],
//                         'costprice'=>$request->costprice [$key],
//             );
//         Goodsreceivedetail::insert($data);
//     }
// }

// Session::flash('message','You have successfully create goods receive.');

// return redirect('goodsreceive/goodsreceiveheader_list');