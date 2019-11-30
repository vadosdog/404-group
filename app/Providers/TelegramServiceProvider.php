<?php


namespace App\Providers;


use App\Services\TelegramService;
use Illuminate\Support\ServiceProvider;

class TelegramServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->singleton(TelegramService::class, function ($app) {
			return new TelegramService(config('services.telegram'));
		});
	}

	public function provides()
	{
		return [TelegramService::class];
	}
}
