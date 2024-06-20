<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [GuestController::class, 'index']);
Route::get('/venue', [GuestController::class, 'show']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.admin.dashboard');
    })->name('dashboard');

    Route::middleware(['role'])->group(function () {
        // Admin

        // Schedule
        Route::resource('/schedule', ScheduleController::class);

        // Sport
        Route::resource('/sport', SportController::class);


        // Venue
        Route::resource('/venue', VenueController::class);

        // Field
        Route::resource('/field', FieldController::class);

        // Order
        Route::resource('/order', OrderController::class);

        // Transaction
        Route::resource('/transaction', TransactionController::class);

        // User
        Route::resource('/user', UserController::class);
    });
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
