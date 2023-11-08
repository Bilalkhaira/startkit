<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CarApiController;
use App\Http\Controllers\API\BlogApiController;
use App\Http\Controllers\API\CarRequestController;
use App\Http\Controllers\API\SellerRequestApiController;

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

// Route::middleware('auth:sanctum')->get('/carPost', function (Request $request) {
// return $request->user();
// });



Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/validate-token/{token?}/{user_id?}', [UserController::class, 'validateToken']);

Route::post('forget-password', [UserController::class, 'submitForgetPasswordForm']);
Route::post('reset-password', [UserController::class, 'submitResetPasswordForm']);

Route::get('/get-all-cars-data', [CarApiController::class, 'index']);
Route::get('/get-car-data/{id}', [CarApiController::class, 'show']);

Route::get('/get-all-blogs-data', [BlogApiController::class, 'index']);
Route::get('/get-blog-data/{id}', [BlogApiController::class, 'show']);

Route::post('/save-car-request', [CarRequestController::class, 'saveCarRequest']);

Route::post('/filter-cars', [CarApiController::class, 'filterCar']);
Route::post('/filter-cars-by-range', [CarApiController::class, 'filterCarByRange']);
Route::get('/filter-cars-get-request/{model}', [CarApiController::class, 'filterCarGetRequest']);

Route::post('/save-seller-request', [SellerRequestApiController::class, 'saveSellerRequest']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('update-user-profile', [UserController::class, 'updateUserProfile']);
    Route::post('update-user-photo', [UserController::class, 'updateUserPhoto']);
    Route::get('/get-user/{id}', [UserController::class, 'getUser']);
});
