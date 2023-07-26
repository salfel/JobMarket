<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('home');
})->name('home');

Route::prefix('auth')->group(function () {
	Route::get('login', Login::class)->name('login');
	Route::get('register', Register::class)->name('register');
	Route::post('logout', function() {
		Auth::logout();
		Session::regenerate();

		return to_route('login');
	})->name('logout');
});
