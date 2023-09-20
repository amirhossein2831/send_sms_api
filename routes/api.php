<?php

use App\Http\Controllers\v1\SMSController;
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
Route::group(['prefix' => 'v1'], function () {
//    Route::apiResource('SMS', SMSController::class)->only('index','show','destroy');

    Route::get('SMS', [SMSController::class, 'index']);
    Route::get('SMS/{sms}', [SMSController::class, 'show']);
    Route::delete('SMS/{sms}', [SMSController::class, 'destroy']);
    Route::post('SMS/sendSMS', [SMSController::class,'sendSMS']);
});
