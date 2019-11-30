<?php


namespace App\Providers;


use App\Services\ViberService;
use Illuminate\Support\ServiceProvider;

class ViberServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->singleton(ViberService::class, function ($app) {
			return new ViberService(config('services.telegram'));
		});
	}

	public function provides()
	{
		return [ViberService::class];
	}
}
