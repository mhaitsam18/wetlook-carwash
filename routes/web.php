<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberBookingController;
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
        Route::get('/booking', [MemberBookingController::class, 'index'])->name('booking');
        Route::get('/member/index', [MemberBookingController::class, 'index'])->name('member.index');
        Route::get('/member/booking/index', [MemberBookingController::class, 'index'])->name('member.booking.index');
    });
});
