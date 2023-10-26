<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarRequestsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\PermissionManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    Artisan::call('optimize:clear');
    return 'clear done';
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return 'migrated successfully';
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'migrated successfully';
});


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

    Route::resource('cars', CarController::class);
    Route::resource('car-request', CarRequestsController::class);
    Route::resource('blogs', BlogController::class);
    Route::get('/imgDelete/{id?}', [CarController::class, 'imgDelete'])->name('cars.imgDelete');

    Route::post('/update-user', [UserProfileController::class, 'updateUser'])->name('updateUser');

});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
