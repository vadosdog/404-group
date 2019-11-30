<?php


namespace App\Providers;


use App\Services\WhatsupService;
use Illuminate\Support\ServiceProvider;

class WhatsupServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->singleton(WhatsupService::class, function ($app) {
			return new WhatsupService(config('services.telegram'));
		});
	}

	public function provides()
	{
		return [WhatsupService::class];
	}
}
