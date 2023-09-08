<?php

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AdminPasswordResetController;

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\DashboardController;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('login', [AdminController::class, 'index'])->name('login.index');
    Route::post('login', [AdminController::class, 'login'])->name('login');

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('admin');
    Route::post('logout', [AdminController::class, 'logout'])->name('logout')->middleware('admin');

    // Forgot/Reset password
    Route::get('forgot-password', [AdminPasswordResetController::class, 'create'])->name('forgot-password');
    Route::post('forgot-password', [AdminPasswordResetController::class, 'sendResetLink'])->name('forgot-password.send');

    Route::get('reset-password/{token}', [AdminPasswordResetController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [AdminPasswordResetController::class, 'handleResetPassword'])->name('reset-password.send');

    // This route is for the DashboardController
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // This route is for the PropertyController
    Route::resource('property', PropertyController::class);


});

