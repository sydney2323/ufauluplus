<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserFeedbackController;
use App\Http\Controllers\AdminNotesAlevelController;
use App\Http\Controllers\AdminNotesOlevelController;
use App\Http\Controllers\UserNotesAlevelController;
use App\Http\Controllers\UserNotesOlevelController;
use App\Http\Controllers\UserQuizOlevelController;
use App\Http\Controllers\UserQuizAlevelController;
use App\Http\Controllers\UserOlevelQuestionsBankController;
use App\Http\Controllers\UserAlevelQuestionsBankController;
use App\Http\Controllers\QuestionOlevelController;
use App\Http\Controllers\QuestionAlevelController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizAlevelController;
use App\Http\Controllers\AdminOlevelQuestionsBankController;
use App\Http\Controllers\AdminAlevelQuestionsBankController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEventsAndNewsController;
use App\Http\Controllers\AdminDashboardDataController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[WelcomeController::class,'welcome']);
Route::get('/events/{id}',[WelcomeController::class,'eventView']);
Route::get('/news/{id}',[WelcomeController::class,'newsView']);
Route::post('/user_feedback_form',[WelcomeController::class,'userFeedbackForm']);
Route::view('/client/profile', 'client.profile');

Route::view('/notes', 'notes');
Route::get('/alevel/{subject}',[UserNotesAlevelController::class,'showNotesAtWelcome']);
Route::get('/olevel/{subject}',[UserNotesOlevelController::class,'showNotesAtWelcome']);
//Route::get('/alevel/{subject}/{topicSlug}',[UserNotesAlevelController::class,'showSpecificTopic']);

//Client-notes
Route::get('/client/O/level/{subject}',[UserNotesOlevelController::class,'show'])->middleware('isLoggedIn');
Route::get('/client/O/level/{subject}/{topicSlug}',[UserNotesOlevelController::class,'showSpecificTopic'])->middleware('isLoggedIn');
Route::get('/client/A/level/{subject}',[UserNotesAlevelController::class,'show'])->middleware('isLoggedIn');
Route::get('/client/A/level/{subject}/{topicSlug}',[UserNotesAlevelController::class,'showSpecificTopic'])->middleware('isLoggedIn');

//Client-Qn & Ans
Route::get('/client/olevel/question-answer-bank/{subject}',[UserOlevelQuestionsBankController::class,'show'])->middleware('isLoggedIn');
Route::get('/client/alevel/question-answer-bank/{subject}',[UserAlevelQuestionsBankController::class,'show'])->middleware('isLoggedIn');


//client
Route::get('/client', function () {
    return view('client.index');
})->middleware('isLoggedIn');
//Client-quiz O
Route::get('/client/olevel/quiz',[UserQuizOlevelController::class,'index'])->middleware('isLoggedIn');
Route::get('/client/olevel/quiz/{subject}',[UserQuizOlevelController::class,'show'])->middleware('isLoggedIn');
Route::get('/client/olevel/quiz/{subject}/take/{quiz_id}',[UserQuizOlevelController::class,'takeQuiz'])->middleware('isLoggedIn');
Route::post('/client/olevel/quiz/take/question/{quiz_id}',[UserQuizOlevelController::class,'loadQuestion'])->middleware('isLoggedIn');
Route::post('/client/olevel/quiz/take/question',[UserQuizOlevelController::class,'userChoice'])->middleware('isLoggedIn');
Route::get('/client/olevel/quiz/{id}/take/question/results',[UserQuizOlevelController::class,'results'])->middleware('isLoggedIn');
Route::post('/client/olevel/quiz/test',[UserQuizOlevelController::class,'viewSingleResult'])->middleware('isLoggedIn');
//Client-quiz A /client/olevel/quiz/
Route::get('/client/alevel/quiz',[UserQuizAlevelController::class,'index'])->middleware('isLoggedIn');
Route::get('/client/alevel/quiz/{subject}',[UserQuizAlevelController::class,'show'])->middleware('isLoggedIn');
Route::get('/client/alevel/quiz/{subject}/take/{quiz_id}',[UserQuizAlevelController::class,'takeQuiz'])->middleware('isLoggedIn');
Route::post('/client/alevel/quiz/take/question/{quiz_id}',[UserQuizAlevelController::class,'loadQuestion'])->middleware('isLoggedIn');
Route::post('/client/alevel/quiz/take/question',[UserQuizAlevelController::class,'userChoice'])->middleware('isLoggedIn');
Route::get('/client/alevel/quiz/{id}/take/question/results',[UserQuizAlevelController::class,'results'])->middleware('isLoggedIn');
Route::post('/client/alevel/quiz/test',[UserQuizAlevelController::class,'viewSingleResult'])->middleware('isLoggedIn');


//user login
Route::get('/login',[UserAuthController::class,'login']);
Route::get('/logout',[UserAuthController::class,'logoutUser']);
Route::get('/register',[UserAuthController::class,'register']);
Route::post('/register-user',[UserAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[UserAuthController::class,'loginUser'])->name('login-user');


/*
--------------------------------------------------------------------------------------------------------
----------------------- Admin Routes ----------------------------------------------------
--------------------------------------------------------------------------------------------------------
*/
Route::get('/admin/logout',[UserAuthController::class,'logoutAdmin']);

//Admin Dashboard
Route::get('/admin/fetch-dashboard-data',[AdminDashboardDataController::class,'fetchDashboardData'])->middleware('adminIsLoggedIn');

//admin Events and News
Route::resource('admin/eventsAndNews', AdminEventsAndNewsController::class)->middleware('adminIsLoggedIn');

///admin fetch-user-feedback
Route::get('/admin/fetch-user-feedback',[AdminUserFeedbackController::class,'fetchUserFeedback'])->middleware('adminIsLoggedIn');
Route::get('/admin/fetch-user-feedback-all',[AdminUserFeedbackController::class,'fetchUserFeedbackAll'])->middleware('adminIsLoggedIn');
//Admin creation
Route::get('/admin/auth',[AdminController::class,'index'])->middleware('adminIsLoggedIn');
Route::get('/admin/auth/fetch',[AdminController::class,'fetchAdmins'])->middleware('adminIsLoggedIn');
Route::post('/admin/auth/create',[AdminController::class,'store'])->middleware('adminIsLoggedIn');
Route::get('/admin/auth/{id}/edit',[AdminController::class,'edit'])->middleware('adminIsLoggedIn');
Route::put('/admin/auth/{id}/',[AdminController::class,'update'])->middleware('adminIsLoggedIn');
Route::delete('/admin/auth/{id}/',[AdminController::class,'destroy'])->middleware('adminIsLoggedIn');

Route::get('/admin', function () {
    return view('admin/index');
})->middleware('adminIsLoggedIn');

// Route::view('/admin/a/notes/post', 'admin/a_post_notes');
// Route::view('/admin/o/notes/post', 'admin/o_post_notes');


//---------    A-level notes routes
Route::get('/admin/a/notes',[AdminNotesAlevelController::class,'index'])->middleware('adminIsLoggedIn');
Route::get('/admin/a/notes/post',[AdminNotesAlevelController::class,'create'])->middleware('adminIsLoggedIn');
Route::post('/admin/a/notes/post/create',[AdminNotesAlevelController::class,'store'])->middleware('adminIsLoggedIn');
Route::get('/admin/a/notes/post/{notesAlevel}/edit',[AdminNotesAlevelController::class,'edit'])->middleware('adminIsLoggedIn');
Route::put('/admin/a/notes/post/{notesAlevel}',[AdminNotesAlevelController::class,'update'])->middleware('adminIsLoggedIn');
Route::delete('/admin/a/notes/post/{notesAlevel}',[AdminNotesAlevelController::class,'destroy'])->middleware('adminIsLoggedIn');

//--------     O-level notes routes
Route::get('/admin/o/notes',[AdminNotesOlevelController::class,'index'])->middleware('adminIsLoggedIn');
Route::get('/admin/o/notes/post',[AdminNotesOlevelController::class,'create'])->middleware('adminIsLoggedIn');
Route::post('/admin/o/notes/post/create',[AdminNotesOlevelController::class,'store'])->middleware('adminIsLoggedIn');
Route::get('/admin/o/notes/post/{notesOlevel}/edit',[AdminNotesOlevelController::class,'edit'])->middleware('adminIsLoggedIn');
Route::put('/admin/o/notes/post/{notesOlevel}',[AdminNotesOlevelController::class,'update'])->middleware('adminIsLoggedIn');
Route::delete('/admin/o/notes/post/{notesOlevel}',[AdminNotesOlevelController::class,'destroy'])->middleware('adminIsLoggedIn');

// Route::resources([
//     '/admin/o/notes' => AdminNotesOlevelController::class,
// ]);

//Quiz O-level route
Route::get('admin/quiz/fetch',[QuizController::class,'fetch'])->middleware('adminIsLoggedIn');
Route::resources([
    'admin/quiz' => QuizController::class,
    'admin/quiz/{quiz_id}/question' => QuestionOlevelController::class,
]);
Route::get('admin/quiz/{quiz_id}/question/{question_id}/edit',[QuestionOlevelController::class,'edit'])->middleware('adminIsLoggedIn');
Route::put('admin/quiz/{quiz_id}/question/{question_id}',[QuestionOlevelController::class,'update'])->middleware('adminIsLoggedIn');
Route::delete('admin/quiz/question/{question_id}',[QuestionOlevelController::class,'destroy'])->middleware('adminIsLoggedIn');

//Quiz A-level route
Route::get('/admin/quiz/alevel/fetch',[QuizAlevelController::class,'fetch'])->middleware('adminIsLoggedIn');
Route::resources([
    'admin-quiz-alevel' => QuizAlevelController::class,
    'admin/quiz/alevel/{quiz_id}/question' => QuestionAlevelController::class,
]);
Route::get('admin/quiz/alevel/{quiz_id}/question/{question_id}/edit',[QuestionAlevelController::class,'edit'])->middleware('adminIsLoggedIn');
Route::put('admin/quiz/alevel/{quiz_id}/question/{question_id}',[QuestionAlevelController::class,'update'])->middleware('adminIsLoggedIn');
Route::delete('admin/quiz/alevel/question/{question_id}',[QuestionAlevelController::class,'destroy'])->middleware('adminIsLoggedIn');
//Question_bank   
Route::resources([
    'admin/o/question-bank' => AdminOlevelQuestionsBankController::class,
    'admin/a/question-bank' => AdminAlevelQuestionsBankController::class,
]);


