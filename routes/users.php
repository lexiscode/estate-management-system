<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainMenu\ViewController;
use App\Http\Controllers\HeaderMenu\BuySaleRentController;


// These routes is for the main menu
Route::get('/', [ViewController::class, '__invoke'])->name('view.home');
Route::get('about', [ViewController::class, 'about'])->name('view.about');
Route::get('agent', [ViewController::class, 'agents'])->name('view.agents');
Route::get('blog', [ViewController::class, 'blog'])->name('view.blog');
Route::get('contact', [ViewController::class, 'contact'])->name('view.contact');

// This route is for the header menu
Route::get('buysalerent', [BuySaleRentController::class, 'index'])->name('view.buysalerent');



/* This route is for registration and login purposes
Route::group(['as'=>'users.', 'prefix' =>'users'], function(){

    Route::get('register', [RegisterController::class, 'create'])->name('signup');
    Route::post('register', [RegisterController::class, 'store'])->name('store');

    Route::get('login', [LoginController::class, 'create'])->name('signin');
    Route::post('login', [LoginController::class, 'verify'])->name('login');

});
*/
