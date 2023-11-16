<?php

<<<<<<< HEAD
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

=======
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetPasswordController;

>>>>>>> b660dffaa6957ff367b848c293c400663f109bdb
// Маршрут для входа пользователя
Route::get('/login', 'App\Http\Controllers\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');

// Маршрут для выхода пользователя
Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');


Route::view('/main', "main")->name('main');
Route::view('/home', 'home')->middleware('auth')->name('home');
Route::view('/login', 'login')->middleware('guest')->name('login');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');


Route::get('/password/reset', 'App\Http\Controllers\ResetPasswordController@showResetForm')->name('password.request');
Route::post('/password/reset', 'App\Http\Controllers\ResetPasswordController@reset')->name('password.update');
<<<<<<< HEAD

Route::get('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'create'])->middleware('guest')->name('password.request_email');
Route::post('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'store'])->middleware('guest')->name('password.email');

Route::get('reset-password-email', [\App\Http\Controllers\Auth\ResetPasswordEmailController::class, 'create'])->middleware('guest')->name('password.reset');
Route::post('reset-password-email', [\App\Http\Controllers\Auth\ResetPasswordEmailController::class, 'store'])->middleware('guest')->name('password.update_email');
=======
>>>>>>> b660dffaa6957ff367b848c293c400663f109bdb

