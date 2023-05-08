<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('channels', ChannelController::class)->parameters(['channels'=> 'channel'])->only(['index', 'show']);
Route::apiResource('videos', VideoController::class);//->only(['index', 'show']);
