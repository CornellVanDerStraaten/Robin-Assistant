<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientUserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'overview'])->name('dashboard');

    Route::group(['prefix' => 'dashboard'], function () {
        Route::resource('patients', PatientController::class);
        Route::group(['prefix' => 'patients/{patient}', 'name' => 'patients.'], function () {
            Route::resource('patient-users', PatientUserController::class);
        });
    });
});
