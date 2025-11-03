<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\userController;

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






