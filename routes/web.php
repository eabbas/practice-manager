<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\userController;

use App\Http\controllers\LessonController;
use App\Http\controllers\PracticeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/user/signup",[userController::class,"signup"]);
Route::post("/user/store",[userController::class,"store"]);
Route::post("/user/check",[userController::class,"check"]);
Route::get("/user/login",[userController::class,"login"]);
Route::get("/user/logout",[userController::class,"logout"])->name("logout");
Route::get("/users",[userController::class,"index"]);
Route::get("/user/edit/{id}",[userController::class,"edit"]);
Route::post("/user/update",[userController::class,"update"])->name("update");
Route::get("/user/show/{id}",[userController::class,"show"]);
Route::get("/user/delete/{id}",[userController::class,"delete"]);


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
  



