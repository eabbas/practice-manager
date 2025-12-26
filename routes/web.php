<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ResponsesController;
use App\Http\Controllers\StudentRequestController;
use App\Http\Controllers\UserLessonController;
use App\Http\Middleware\sendMiddleware;
use App\Http\Middleware\addressMiddleware;
use App\Models\studentRequest;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group([
    'prefix'=>'user',
    'controller'=>userController::class,
    'as'=>'user.'
], function(){
    Route::get("/signup","signup")->name('signup');
    Route::post("/store","store")->name('store');
    Route::post("/check","check")->name('check');
    Route::get("/login","login")->name('login')->middleware(addressMiddleware::class);
    Route::get("/logout","logout")->name("logout");
    Route::get("/","index")->name('list');
    Route::get('/edit/profile' , "edit_profile")->name('edit_profile');
    Route::get("/edit/{user}","edit")->name('edit');
    Route::post("/update","update")->name("update");
    Route::get("/show/{user}","show")->name('single');
    Route::get('/profile/{user}', 'profile')->name('profile');
    Route::get('/setting' , "setting")->name('setting');
    Route::get('/complete' , "complete_profile")->name("complete_profile");
    Route::post('/save' , "save")->name("save");
    Route::get("/delete/{suer}","delete")->name('delete');
    Route::get('/mmd', function(){
    Auth::logout();
    });

});

//lessons

Route::get('/lesson/create', [LessonController::class , 'create'])->name("lesson_create");

Route::post('/lesson/store', [LessonController::class , 'store']);

Route::get('/lessons' , [LessonController::class , 'index'])->name('lesson_list');

Route::get('/lesson/show/{lesson}' , [LessonController::class , 'show'])->name('lesson_show');

Route::get('/lesson/edit/{id}' , [LessonController::class , 'edit'])->name('lesson_edit');

Route::post('/lesson/update' , [LessonController::class, 'update'])->name('lesson_update');

Route::get('/lesson/practice/{lesson}' ,[LessonController::class , 'practice_list'])->name('practice_list');

Route::get('/lesson/delete/{id}' , [LessonController::class , 'delete'])->name('lesson_delete');

// practices

Route::get('/practice/create/{lesson}' , [PracticeController::class , 'create'])->name('practice_create');

Route::post('/practice/store' , [PracticeController::class , 'store']);

Route::get('/practices' , [PracticeController::class , 'index'])->name('practices_list');

Route::get('/practice/show/{practice}' , [PracticeController::class , 'show'])->name('practice_show');

Route::get('/practice/edit/{id}' , [PracticeController::class , 'edit'])->name('practice_edit');

Route::post('/practice/update' , [PracticeController::class , 'update'])->name('practice_update');

Route::get('/practice/delete/{id}' , [PracticeController::class , 'delete'])->name('practice_delete');


//userLesson

Route::get('/send/lesson/{lesson?}' , [UserLessonController::class , 'lesson_address'])->name('lesson_address')->middleware(sendMiddleware::class);

Route::post('/request/store',[UserLessonController::class,'store'])->name('userLesson_store');

Route::get('/my/requests',[UserLessonController::class , 'my_requests'])->name('my_requests');

Route::get('/request/list/{lesson?}' ,[UserLessonController::class , 'request_list'])->name('request_list');

Route::get('/lesson/request/approve/{userId}/{lessonId}', [UserLessonController::class,'approveRequest'])->name('request_approve');

Route::get('/student/class', [UserLessonController::class,'student_class'])->name('student_class');

Route::get('/delete/request/{lesson}/{id}' , [UserLessonController::class, 'delete_request'])->name('delete_request');

Route::post('/user/select' , [UserLessonController::class , "user_select"])->name('user_select');


//responses 


Route::post('/response/store',[ResponsesController::class , 'store'])->name('response_store');


Route::get('response/list/{practice}' , [ResponsesController::class , 'response_list'])->name('response_list');

Route::get('/student/responses/{student}/{practice}/{master}' , [ResponsesController::class , 'student_responses'])->name('student_responses');

