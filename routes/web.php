<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Companies\Create;
use App\Livewire\Companies\Index;
use App\Livewire\Companies\Show;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('livewire.home');
})->name('home');

Route::prefix('auth')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
    Route::post('logout', LogoutController::class)->name('auth.logout');
});

Route::prefix('companies')->group(function () {
    Route::get('/', Index::class)->name('companies.index');
    Route::get('/create', Create::class)->name('companies.create');
    Route::get('/{company}', Show::class)->name('companies.show');
});
