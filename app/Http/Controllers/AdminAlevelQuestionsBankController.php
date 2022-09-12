<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionBankAlevel;

class AdminAlevelQuestionsBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionBankAlevels = QuestionBankAlevel::all();
        return view('admin.questions_bank.alevel.index',compact('questionBankAlevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions_bank.alevel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        QuestionBankAlevel::create(request()->validate([
            'subject' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]));

        return redirect('admin/a/question-bank');
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
        $questionBankAlevel = QuestionBankAlevel::findOrFail($id);
        return view('admin.questions_bank.alevel.edit',compact('questionBankAlevel'));
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
        $questionBankAlevel = QuestionBankAlevel::findOrFail($id);
        $questionBankAlevel->update(request()->validate([
            'subject' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]));
        return redirect('/admin/a/question-bank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionBankAlevel = QuestionBankAlevel::findOrFail($id);
        $questionBankAlevel->delete();
        return redirect('/admin/a/question-bank');
    }
}
