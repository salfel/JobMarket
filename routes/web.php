<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadController;

Route::inertia('/', 'Home')->name('home');
Route::get('/dashboard', DashboardController::class)->name('dashboard')->middleware('auth');

Route::resource('companies', CompanyController::class);
Route::resource('jobs', JobController::class);
Route::resource('jobs.applications', ApplicationController::class)->shallow();

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::get('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('register', [AuthController::class, 'store'])->name('auth.store');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::post('upload', UploadController::class)->name('upload');
