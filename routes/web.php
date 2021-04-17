<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\TemplateController;
use App\Http\Controllers\admin\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

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
Route::get("/",[AdminAuthController::class,"signin"]);

Route::group(['prefix' => 'admin'], function(){
    Route::post('/login',[AdminAuthController::class,'login']);

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::group(['prefix' => 'user'],function(){
            Route::get("/list",[UserController::class,'index']);
            Route::get("/create",[UserController::class,"create"]);
            Route::post("/create",[UserController::class,"store"]);
            Route::get("/show/{id}",[UserController::class,"show"]);
            Route::post("/update/{id}",[UserController::class,"update"]);
            Route::post("/update/status/{id}",[UserController::class,"updateStatus"]);
            Route::post("/delete/{id}",[UserController::class,"destroy"]);
        });
        Route::group(['prefix' => 'template'],function(){
            Route::get("/list",[TemplateController::class,'index']);
            Route::get("/create",[TemplateController::class,"create"]);
            Route::post("/create",[TemplateController::class,"store"]);
            Route::get("/show/{id}",[TemplateController::class,"show"]);
            Route::post("/update/{id}",[TemplateController::class,"update"]);
            Route::post("/update/status/{id}",[TemplateController::class,"updateStatus"]);
            Route::post("/delete/{id}",[TemplateController::class,"destroy"]);
        });

        Route::group(['prefix' => "profile"],function (){
            Route::get("/show",[UserController::class,"showProfile"]);
            Route::post("/update",[UserController::class,"updateProfile"]);
            Route::get("/change/password",[UserController::class,"changePassword"]);
            Route::post("/password",[UserController::class,"updatePassword"]);
            Route::get("/change/avatar",[UserController::class,"changeAvatar"]);
            Route::post("/avatar",[UserController::class,"updateAvatar"]);
        });

        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/logout', [AdminAuthController::class, 'logout']);
    });


});

