<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainMenu\ViewController;
use App\Http\Controllers\HeaderMenu\BuySaleRentController;
use App\Http\Controllers\BlogDetailController;
use App\Http\Controllers\PropertyDetailController;


// These routes is for the main menu
Route::get('/', [ViewController::class, '__invoke'])->name('view.home');
Route::get('about', [ViewController::class, 'about'])->name('view.about');
Route::get('agent', [ViewController::class, 'agents'])->name('view.agents');
Route::get('blog', [ViewController::class, 'blog'])->name('view.blog');
Route::get('contact', [ViewController::class, 'contact'])->name('view.contact');

// This route is for the header menu
Route::get('buysalerent', [BuySaleRentController::class, 'index'])->name('view.buysalerent');

Route::get('property-detail', [PropertyDetailController::class, 'index'])->name('view.property-detail');
Route::get('blog-detail', [BlogDetailController::class, 'index'])->name('view.blog-detail');

Route::post('newsletter', [NewsletterController::class, 'store'])->name('store.newsletter');


