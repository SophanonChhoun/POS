<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\TemplateController;
use App\Http\Controllers\admin\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\PromotionController;
use App\Http\Controllers\admin\DealerController;
use App\Http\Controllers\admin\BuyerController;
use App\Http\Controllers\admin\ImportController;
use App\Http\Controllers\admin\SaleController;
use App\Http\Controllers\admin\CurrencyController;
use App\Http\Controllers\admin\FAQController;
use App\Http\Controllers\admin\FAQQuestionController;

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

        Route::group(['prefix' => 'dealer'],function(){
            Route::get("/list",[DealerController::class,'index']);
            Route::get("/create",[DealerController::class,"create"]);
            Route::post("/create",[DealerController::class,"store"]);
            Route::get("/show/{id}",[DealerController::class,"show"]);
            Route::post("/update/{id}",[DealerController::class,"update"]);
            Route::post("/update/status/{id}",[DealerController::class,"updateStatus"]);
            Route::post("/delete/{id}",[DealerController::class,"destroy"]);
        });

        Route::group(['prefix' => 'buyer'],function(){
            Route::get("/list",[BuyerController::class,'index']);
            Route::get("/create",[BuyerController::class,"create"]);
            Route::post("/create",[BuyerController::class,"store"]);
            Route::get("/show/{id}",[BuyerController::class,"show"]);
            Route::post("/update/{id}",[BuyerController::class,"update"]);
            Route::post("/update/status/{id}",[BuyerController::class,"updateStatus"]);
            Route::post("/delete/{id}",[BuyerController::class,"destroy"]);
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

        Route::group(['prefix' => 'category'],function(){
            Route::get("/list",[CategoryController::class,'index']);
            Route::get("/create",[CategoryController::class,"create"]);
            Route::post("/create",[CategoryController::class,"store"]);
            Route::get("/show/{id}",[CategoryController::class,"show"]);
            Route::post("/update/{id}",[CategoryController::class,"update"]);
            Route::post("/update/status/{id}",[CategoryController::class,"updateStatus"]);
            Route::patch("/update/order/{id}",[CategoryController::class,"updateOrder"]);
            Route::post("/delete/{id}",[CategoryController::class,"destroy"]);
        });

        Route::group(['prefix' => 'faq'],function(){
            Route::get("/list",[FAQController::class,'index']);
            Route::get("/create",[FAQController::class,"create"]);
            Route::post("/create",[FAQController::class,"store"]);
            Route::get("/show/{id}",[FAQController::class,"show"]);
            Route::post("/update/{id}",[FAQController::class,"update"]);
            Route::post("/update/status/{id}",[FAQController::class,"updateStatus"]);
            Route::patch("/update/order/{id}",[FAQController::class,"updateOrder"]);
            Route::post("/delete/{id}",[FAQController::class,"destroy"]);
        });

        Route::group(['prefix' => 'faq_question'],function(){
            Route::get("/list",[FAQQuestionController::class,'index']);
            Route::get("/create",[FAQQuestionController::class,"create"]);
            Route::post("/create",[FAQQuestionController::class,"store"]);
            Route::get("/show/{id}",[FAQQuestionController::class,"show"]);
            Route::post("/update/{id}",[FAQQuestionController::class,"update"]);
            Route::post("/update/status/{id}",[FAQQuestionController::class,"updateStatus"]);
            Route::patch("/update/order/{id}",[FAQQuestionController::class,"updateOrder"]);
            Route::post("/delete/{id}",[FAQQuestionController::class,"destroy"]);
        });

        Route::group(['prefix' => 'subcategory'],function(){
            Route::get("/list",[SubCategoryController::class,'index']);
            Route::get("/create",[SubCategoryController::class,"create"]);
            Route::post("/create",[SubCategoryController::class,"store"]);
            Route::get("/show/{id}",[SubCategoryController::class,"show"]);
            Route::post("/update/{id}",[SubCategoryController::class,"update"]);
            Route::post("/update/status/{id}",[SubCategoryController::class,"updateStatus"]);
            Route::patch("/update/order/{id}",[SubCategoryController::class,"updateOrder"]);
            Route::post("/delete/{id}",[SubCategoryController::class,"destroy"]);
        });

        Route::group(['prefix' => 'currency'],function(){
            Route::get("/list",[CurrencyController::class,'index']);
            Route::patch("/update/price/{id}",[CurrencyController::class,"updatePrice"]);
        });

        Route::group(['prefix' => 'product'],function(){
            Route::get("/list",[ProductController::class,'index']);
            Route::get("/create",[ProductController::class,"create"]);
            Route::post("/create",[ProductController::class,"store"]);
            Route::get("/show/{id}",[ProductController::class,"show"]);
            Route::post("/update/{id}",[ProductController::class,"update"]);
            Route::post("/update/status/{id}",[ProductController::class,"updateStatus"]);
            Route::patch("/update/order/{id}",[ProductController::class,"updateOrder"]);
            Route::patch("/update/quantity/{id}",[ProductController::class,"updateQuantity"]);
            Route::patch("/update/price/{id}",[ProductController::class,"updatePrice"]);
            Route::post("/delete/{id}",[ProductController::class,"destroy"]);
        });
        Route::group(['prefix' => 'import'],function(){
            Route::get("/list",[ImportController::class,'index']);
            Route::get("/create",[ImportController::class,'create']);
            Route::post("/create",[ImportController::class,'store']);
            Route::get("/show/{id}",[ImportController::class,'show']);
            Route::post("/delete/{id}",[ImportController::class,'destroy']);
            Route::post("/update/paid/{id}",[ImportController::class,'updatePaid']);
            Route::post("/update/status/{id}",[ImportController::class,'updateStatus']);
            Route::post("/update/arrived/{id}",[ImportController::class,'updateArrived']);
        });
        Route::group(['prefix' => 'sale'],function(){
            Route::get("/list",[SaleController::class,'index']);
            Route::get("/create",[SaleController::class,'create']);
            Route::post("/create",[SaleController::class,'store']);
            Route::get("/show/{id}",[SaleController::class,'show']);
            Route::post("/update/{id}",[SaleController::class,'update']);
            Route::post("/update/paid/{id}",[SaleController::class,'updatePaid']);
            Route::post("/delete/{id}",[SaleController::class,'destroy']);
            Route::post("/update/delivered/{id}",[SaleController::class,'updateDelivered']);
        });
        Route::group(['prefix' => "banner"],function (){
            Route::get("/list",[BannerController::class,"index"]);
            Route::post("/update",[BannerController::class,"update"]);
        });

        Route::group(['prefix' => "slider"],function (){
            Route::get("/list",[SliderController::class,"index"]);
            Route::post("/update",[SliderController::class,"update"]);
        });

        Route::group(['prefix' => 'contact'],function(){
            Route::get("/list",[ContactController::class,'index']);
            Route::get("/create",[ContactController::class,"create"]);
            Route::post("/create",[ContactController::class,"store"]);
            Route::get("/show/{id}",[ContactController::class,"show"]);
            Route::post("/update/{id}",[ContactController::class,"update"]);
            Route::post("/update/status/{id}",[ContactController::class,"updateStatus"]);
            Route::post("/delete/{id}",[ContactController::class,"destroy"]);
        });

        Route::group(['prefix' => 'promotion'],function(){
            Route::get("/list",[PromotionController::class,'index']);
            Route::get("/create",[PromotionController::class,"create"]);
            Route::post("/create",[PromotionController::class,"store"]);
            Route::get("/show/{id}",[PromotionController::class,"show"]);
            Route::post("/update/{id}",[PromotionController::class,"update"]);
            Route::post("/update/status/{id}",[PromotionController::class,"updateStatus"]);
            Route::post("/delete/{id}",[PromotionController::class,"destroy"]);
        });

        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/logout', [AdminAuthController::class, 'logout']);
    });


});

