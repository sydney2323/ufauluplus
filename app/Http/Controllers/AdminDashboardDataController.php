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
        $count = $userFeedback->count();
        return response()->json([
            'data'  => $userFeedback,
            'count'  => $count
        ]);
    }
}
