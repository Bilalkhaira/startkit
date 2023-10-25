<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CarRequestController;

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

Route::middleware('auth:sanctum')->get('/carPost', function (Request $request) {
    // return $request->user();
});

Route::post('/save-car-request', [CarRequestController::class, 'saveCarRequest']);

Route::post('/register', [UserController::class, 'register']);
Route::post('/signin', [UserController::class, 'signin']);

Route::post('forget-password', [UserController::class, 'submitForgetPasswordForm']);
Route::post('reset-password', [UserController::class, 'submitResetPasswordForm']);

// Route::middleware('auth:sanctum')->group( function () {
// });
