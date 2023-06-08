<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthenticationController;
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

// Route::apiResource('channels', ChannelController::class);
// Route::apiResource('videos', VideoController::class)
//     ->parameters(['videos' => 'video'])->only(['index', 'show']);

    Route::post('/register', [AuthenticationController::class, 'register']);
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('profile', function(Request $request) {
            return auth()->user();
        });
        Route::apiResource('videos', VideoController::class);
        Route::get('channels/{id}/videos', [VideoController::class, 'indexFunctie']);
        Route::delete('channels/{id}/videos', [VideoController::class, 'destroyFunctie']);

        Route::apiResource('channels', ChannelController::class)->parameters(['channels' => 'channel'])->only(['index', 'show']);
        Route::post('/logout', [AuthenticationController::class, 'logout']);
    });
