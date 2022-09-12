<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionBankAlevel;

class UserAlevelQuestionsBankController extends Controller
{
    public function show($subject)
    {
        $subjectTitle = $subject;
        $questionBanks = QuestionBankAlevel::where('subject',$subject)->paginate(5);
        
        return view('client.question_answers',compact('subjectTitle','questionBanks'));
    }
}
