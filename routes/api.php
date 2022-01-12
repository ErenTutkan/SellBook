<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\CategoryController;
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

    Route::post('/logout',[LoginController::class,'Logout']);
    Route::get('/category',[CategoryController::class,'index']);
    Route::post('/categoryadd',[CategoryController::class,'store']);
    Route::get('/getCategory/{id}',[CategoryController::class,'show']);
    Route::post('/updatecategory/{id}',[CategoryController::class,'update']);
    Route::delete('/deletecategory/{id}',[CategoryController::class,'destroy']);
});
Route::post('register',[RegisterController::class,'Register']);
Route::post('login',[LoginController::class,'Login']);
