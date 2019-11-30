<?php


namespace App\Notifications;


use App\Interfaces\MessengerNotificationInterface;
use App\Models\Recipient;

class MessengerChannel
{
	public function send(Recipient $notifiable, MessengerNotificationInterface $notification)
	{
		dd($notification);
	}
}
