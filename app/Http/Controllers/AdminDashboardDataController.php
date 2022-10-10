<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizOlevel;
use App\Models\QuizAlevel;
use App\Models\NotesOlevel;
use App\Models\NotesAlevel;
use App\Models\User;

class AdminDashboardDataController extends Controller
{ 
    public function fetchDashboardData()
    {
        $quizOlevel = QuizOlevel::all()->count();
        $quizAlevel = QuizAlevel::all()->count();
        $NotesOlevel = NotesOlevel::all()->count();
        $NotesAlevel = NotesAlevel::all()->count();
        $User_O = User::where('level','O')->get()->count();
        $User_A = User::where('level','A')->get()->count();

        return response()->json([
            'quizOlevel'  => $quizOlevel,
            'quizAlevel'  => $quizAlevel,
            'NotesOlevel'  => $NotesOlevel,
            'NotesAlevel'  => $NotesAlevel,
            'User_O'  => $User_O,
            'User_A'  => $User_A
        ]);
    }
}
