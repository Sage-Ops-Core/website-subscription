<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Subscription
Route::post('/subscribe', [\App\Http\Controllers\Subscription::class,'subscribe']);
Route::delete('/unsubscribe/{id}', [\App\Http\Controllers\Subscription::class,'unsubscribe']);

//Post
Route::post('/create', [\App\Http\Controllers\Post::class,'post']);
Route::delete('/unsubscribe/{id}', [\App\Http\Controllers\Subscription::class,'unsubscribe']);
