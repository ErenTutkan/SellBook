<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RoleController;
/*
|-------------------------------------------1-------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::group(['prefix'=>'user'],function(){
       Route::get('/list',[UserController::class,'index']);
       Route::post('/updateRole/{id}',[UserController::class,'updateRole']);
    });
    Route::group(['prefix'=>'role'],function(){
       Route::get('/list',[RoleController::class,'index']);

    });

    Route::post('/logout',[LoginController::class,'Logout']);
    Route::get('/category',[CategoryController::class,'index']);
    Route::post('/categoryadd',[CategoryController::class,'store']);
    Route::get('/getCategory/{id}',[CategoryController::class,'show']);
    Route::post('/updatecategory/{id}',[CategoryController::class,'update']);
    Route::delete('/deletecategory/{id}',[CategoryController::class,'destroy']);
    Route::get('/books',[BookController::class,'index']);
    Route::post('/addbook',[BookController::class,'store']);
    Route::get('/getbook/{id}',[BookController::class,'show']);
    Route::post('/updatebook/{id}',[BookController::class,'update']);
    Route::delete('/deletebook/{id}',[BookController::class,'destroy']);
});
Route::post('register',[RegisterController::class,'Register']);
Route::post('login',[LoginController::class,'Login']);
