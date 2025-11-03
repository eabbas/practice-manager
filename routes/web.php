<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\userController;

use App\Http\controllers\LessonController;
use App\Http\controllers\PracticeController;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix'=>'user',
    'controller'=>userController::class,
    'as'=>'user.'
], function(){
    Route::get("/signup",[userController::class,"signup"])->name('signup');
    Route::post("/store",[userController::class,"store"])->name('store');
    Route::post("/check",[userController::class,"check"])->name('check');
    Route::get("/login",[userController::class,"login"])->name('login');
    Route::get("/logout",[userController::class,"logout"])->name("logout");
    Route::get("/",[userController::class,"index"])->name('list');
    Route::get("/edit/{user}",[userController::class,"edit"])->name('edit');
    Route::post("/update",[userController::class,"update"])->name("update");
    Route::get("/show/{user}",[userController::class,"show"])->name('single');
    Route::get("/delete/{suer}",[userController::class,"delete"])->name('delete');

});


Route::get('/lesson/create', [LessonController::class , 'create']);

Route::post('/lesson/store', [LessonController::class , 'store']);

Route::get('/lessons' , [LessonController::class , 'index'])->name('lesson_list');

Route::get('/lesson/show/{id}' , [LessonController::class , 'show']);

Route::get('/lesson/edit/{id}' , [LessonController::class , 'edit']);

Route::post('/lesson/update' , [LessonController::class, 'update']);

Route::get('/lesson/delete/{id}' , [LessonController::class , 'delete']);

// practice

Route::get('/practice/create' , [PracticeController::class , 'create']);

Route::post('/practice/store' , [PracticeController::class , 'store']);

Route::get('/practices' , [PracticeController::class , 'index'])->name('practice_list');

Route::get('/practice/show/{id}' , [PracticeController::class , 'show']);

Route::get('/practice/edit/{id}' , [PracticeController::class , 'edit']);

Route::post('/practice/update' , [PracticeController::class , 'update']);

Route::get('/practice/delete/{id}' , [PracticeController::class , 'delete']);
  



