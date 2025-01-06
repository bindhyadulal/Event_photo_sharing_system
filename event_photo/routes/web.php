<?php

use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventBookingController;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth'])->group(function(){
    Route::get('/user-dashboard',[UserController::class,'index'])->name('user.index');
});

Route::middleware(['auth',AuthAdmin::class])->group(function(){
    Route::get('/admin-dashboard',[AdminController::class,'index'])->name('admin.index');
});

Route::post('/event-booking',[EventBookingController::class,'eventManager'])->name('admin.event.booking');
// Route::get('/guest-landing',[EventBookingController::class,'guest_redirect'])->name('admin.guest');


Route::get('/guest-terms-condition',[EventBookingController::class,'terms_condition'])->name('admin.guest.terms');
Route::get('/guest-landing',[EventBookingController::class,'guest_redirect'])->name('admin.guest');

Route::post('/guest-upload',[EventBookingController::class,'photo_store'])->name('guest.uploads');


