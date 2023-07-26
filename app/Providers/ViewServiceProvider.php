<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
	public function register()
	{

	}

	public function boot()
	{
		View::composer('*', function ($view) {
			$view->with('user', Auth::user());
		});
	}
}
