<?php

use App\Http\Controllers\AdminAdminController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminOrderDetailController;
use App\Http\Controllers\AdminPackageController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\AdminVehicleController;
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
            Route::resource('vehicle', MemberVehicleController::class);
            Route::get('/my-profile', [MemberController::class, 'index'])->name('member.my-profile');
            Route::get('/index', [MemberBookingController::class, 'create'])->name('member.index');
            Route::get('/booking/index', [MemberBookingController::class, 'index'])->name('member.booking.index');

            Route::resource('booking', MemberBookingController::class);
        });
        Route::get('/my-profile', [MemberController::class, 'index'])->name('my-profile');
        Route::put('/my-profile/{member}', [MemberController::class, 'update'])->name('update.member');
        Route::put('/change-password/{user}', [MemberController::class, 'updatePassword'])->name('update.password');

        Route::get('/bookingan-saya', [MemberBookingController::class, 'booking'])->name('booking');
    });
    Route::middleware('admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
            Route::get('/my-profile', [AdminController::class, 'index'])->name('admin.my-profile');
            Route::put('/my-profile/{admin}', [AdminController::class, 'update'])->name('admin.my-profile.update');
            Route::put('/change-password/{user}', [AdminController::class, 'updatePassword'])->name('admin.password.update');

            Route::resource('admin', AdminAdminController::class);
            Route::resource('member', AdminMemberController::class);
            Route::resource('vehicle', AdminVehicleController::class);
            Route::resource('package', AdminPackageController::class);
            Route::resource('product', AdminProductController::class);
            Route::resource('room', AdminRoomController::class);
            Route::resource('booking', AdminBookingController::class);
            Route::resource('order', AdminOrderController::class);
            Route::resource('order.detail', AdminOrderDetailController::class);
        });
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');
});
