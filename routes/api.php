<?php

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

    // Rest Api (Restful Api)
Route::prefix('v1')->group(function(){
    Route::apiResource('post',PostApiController::class);
});
