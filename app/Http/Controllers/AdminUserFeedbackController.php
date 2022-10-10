<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserFeedback;

class AdminUserFeedbackController extends Controller
{
    public function fetchUserFeedback(Request $request)
    {
        $userFeedback = UserFeedback::where('read_status', 0)->where('admin_id', 0)->orderBy('id','desc')->get();
        $count = $userFeedback->count();
        return response()->json([
            'data'  => $userFeedback,
            'count'  => $count
        ]);
    }

    public function fetchUserFeedbackAll(Request $request)
    {
        $userFeedbacks = UserFeedback::orderBy('id','desc')->paginate(5);
        return view('admin.feedback',compact('userFeedbacks'));
    }
}
