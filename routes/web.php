<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetPasswordController;

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

