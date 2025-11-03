<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\userController;
use App\Http\controllers\LessonController;
use App\Http\controllers\PracticeController;

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
    Route::get("/login","login")->name('login');
    Route::get("/logout","logout")->name("logout");
    Route::get("/","index")->name('list');
    Route::get("/edit/{user}","edit")->name('edit');
    Route::post("/update","update")->name("update");
    Route::get("/show/{user}","show")->name('single');
    Route::get('/profile/{user}', 'profile')->name('profile');
    Route::get("/delete/{suer}","delete")->name('delete');

});

//lessons

Route::get('/lesson/create', [LessonController::class , 'create'])->name("lesson_create");

Route::post('/lesson/store', [LessonController::class , 'store']);

Route::get('/lessons' , [LessonController::class , 'index'])->name('lesson_list');

Route::get('/lesson/show/{id}' , [LessonController::class , 'show'])->name('lesson_show');

Route::get('/lesson/edit/{id}' , [LessonController::class , 'edit'])->name('lesson_edit');

Route::post('/lesson/update' , [LessonController::class, 'update'])->name('lesson_update');

Route::get('/lesson/delete/{id}' , [LessonController::class , 'delete'])->name('lesson_delete');

// practices

Route::get('/practice/create/{lesson}' , [PracticeController::class , 'create'])->name('practice_create');

Route::post('/practice/store' , [PracticeController::class , 'store']);

Route::get('/practices' , [PracticeController::class , 'index'])->name('practice_list');

Route::get('/practice/show/{id}' , [PracticeController::class , 'show']);

Route::get('/practice/edit/{id}' , [PracticeController::class , 'edit']);

Route::post('/practice/update' , [PracticeController::class , 'update']);

Route::get('/practice/delete/{id}' , [PracticeController::class , 'delete']);
  



