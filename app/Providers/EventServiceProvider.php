<?php

namespace App\Providers;

use App\Listeners\MessageSentListener;
use Illuminate\Notifications\Events\NotificationSent;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		NotificationSent::class => [
			MessageSentListener::class,
		],
	];
}
