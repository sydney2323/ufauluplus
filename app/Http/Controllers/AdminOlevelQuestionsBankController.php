<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionBankOlevel;

class AdminOlevelQuestionsBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionBankOlevels = QuestionBankOlevel::all();
        return view('admin.questions_bank.olevel.index',compact('questionBankOlevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions_bank.olevel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        QuestionBankOlevel::create(request()->validate([
            'subject' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]));

        return redirect('admin/o/question-bank');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionBankOlevel = QuestionBankOlevel::findOrFail($id);
        return view('admin.questions_bank.olevel.edit',compact('questionBankOlevel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $questionBankOlevel = QuestionBankOlevel::findOrFail($id);
        $questionBankOlevel->update(request()->validate([
            'subject' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]));
        return redirect('/admin/o/question-bank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionBankOlevel = QuestionBankOlevel::findOrFail($id);
        $questionBankOlevel->delete();
        return redirect('/admin/o/question-bank');
    }
}
