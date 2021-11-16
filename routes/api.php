<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubscriberController;
use App\Http\Controllers\Api\PostController;

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

Route::group(array('prefix' => '/v1'), function () {
    Route::get('/task', function (Request $request){
        $message = ['message', 'Welcome to subscriber API Endpoint'];
        return response()->json($message, 200);
    });
    Route::post('/task/subscribe', [SubscriberController::class, 'store']);
    Route::post('/task/post', [PostController::class, 'store']);
});
