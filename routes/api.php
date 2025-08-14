<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\PostApiController;
//use App\Http\Controllers\PostController;
//use App\Http\Controllers\TagController;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CommentController;
//
//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
//
//Route::get('welcome',function()
//{
//    return 'Welcome to Api';
//});

// POST /v1/auth/login
// POST /v1/auth/refersh
// GET /v1/auth/me
// POST /v1/auth/logout

    // Rest Api (Restful Api)
Route::prefix('v1')->group(function(){
    Route::apiResource('post',PostApiController::class)->middleware('auth:api');


    Route::prefix('auth')->group(function(){
        Route::post('login',[AuthController::class,'login']);
    });
    // only if user authinticated with JWT (Authorization Header)
    Route::middleware('auth:api')->group(function(){
        Route::get( 'me',[AuthController::class,'me']);
        Route::post( 'logout',[AuthController::class,'logout']);
        Route::post('refresh',[AuthController::class,'refresh']);
    });
    
});
