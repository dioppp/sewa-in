<?php

use App\Http\Controllers\Admin\FieldController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SportController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VenueController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Owner\OwnerFieldController;
use App\Http\Controllers\Owner\OwnerOrderController;
use App\Http\Controllers\Owner\OwnerTransactionController;
use App\Http\Controllers\Owner\OwnerVenueController;

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
Route::get('/register-venue', [GuestController::class, 'registerVenue'])->name('register.venue');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/field/{venue}', [HomeController::class, 'showFields'])->name('dashboard.field');
    Route::get('/dashboard/transaction', [HomeController::class, 'index'])->name('dashboard.transaction');

    Route::middleware(['owner'])->group(function () {
        // Venue
        Route::resource('/owner-venue', OwnerVenueController::class)->except(['show', 'create', 'edit']);

        // Field
        Route::resource('/owner-field', OwnerFieldController::class)->except(['show', 'create', 'edit']);

        // Order
        Route::resource('/owner-order', OwnerOrderController::class)->except(['show', 'create', 'edit']);

        // Transaction
        Route::get('/owner-transaction', [OwnerTransactionController::class, 'index'])->name('owner-transaction.index');

    });

    Route::middleware(['role'])->group(function () {
        // Schedule
        Route::resource('/schedule', ScheduleController::class)->except(['show', 'create', 'edit']);

        // Sport
        Route::resource('/sport', SportController::class)->except(['show', 'create', 'edit']);

        // Venue
        Route::resource('/venue', VenueController::class)->except(['show', 'create', 'edit']);

        // Field
        Route::resource('/field', FieldController::class)->except(['show' ,'create', 'edit']);

        // Order
        Route::resource('/order', OrderController::class)->except(['show', 'create', 'edit']);

        // Transaction
        Route::resource('/transaction', TransactionController::class)->except(['show', 'create', 'edit']);;

        // User
        Route::resource('/user', UserController::class);
    });
});
