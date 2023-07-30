<?php

//Route::get('/', function () {
//    return view('home');
//})->name('home');
//
//Route::prefix('auth')->group(function () {
//    Route::get('login', Login::class)->name('login');
//    //    Route::get('register', Register::class)->name('register');
//    Route::post('logout', LogoutController::class)->name('auth.logout');
//});
//
//Route::prefix('companies')->group(function () {
//    Route::get('/', Index::class)->name('companies.index');
//    Route::get('/{company}', Show::class)->name('companies.show');
//});

use App\Http\Controllers\LogoutController;

Route::post('auth/logout', LogoutController::class)->name('auth.logout');
