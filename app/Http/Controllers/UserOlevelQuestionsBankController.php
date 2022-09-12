<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionBankOlevel;

class UserOlevelQuestionsBankController extends Controller
{
    public function show(Request $request)
    {
        $subjectTitle = $request->subject;
        $questionBanks = QuestionBankOlevel::where('subject',$request->subject)->paginate(5);
        return view('client.question_answers',compact('subjectTitle','questionBanks'));
    }
}
