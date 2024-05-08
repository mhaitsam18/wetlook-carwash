<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberBookingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberVehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');



Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::middleware('member')->group(function () {
        Route::prefix('member')->group(function () {
            Route::get('/my-profile', [MemberController::class, 'index'])->name('member.my-profile');
            Route::get('/index', [MemberBookingController::class, 'index'])->name('member.index');
            Route::get('/booking/index', [MemberBookingController::class, 'index'])->name('member.booking.index');
        });
        Route::get('/my-profile', [MemberController::class, 'index'])->name('my-profile');
        Route::put('/my-profile/{member}', [MemberController::class, 'update'])->name('update.member');
        Route::put('/change-password/{user}', [MemberController::class, 'updatePassword'])->name('update.password');


        Route::get('/booking', [MemberBookingController::class, 'index'])->name('booking');

        Route::resource('/member/vehicle/', MemberVehicleController::class);
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');
});
