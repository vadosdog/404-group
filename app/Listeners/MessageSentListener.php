<?php


namespace App\Listeners;


use App\Interfaces\MessengerNotificationInterface;
use Illuminate\Notifications\Events\NotificationSent;

class MessageSentListener
{
	public function handle(NotificationSent $event)
	{
		$notification = $event->notification;
		if ($notification instanceof MessengerNotificationInterface) {
			$notification->success();
		}
	}
}
