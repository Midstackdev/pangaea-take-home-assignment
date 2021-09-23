<?php

use App\Http\Controllers\TopicController;
use App\Http\Controllers\TopicSubscriptionController;
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

Route::get('/topic/{topic:title}', [TopicController::class, 'show']);
Route::post('/subscribe/{topic:title}', [TopicSubscriptionController::class, 'store']);
Route::post('/publish/{topic:title}', [TopicSubscriptionController::class, 'publish']);
