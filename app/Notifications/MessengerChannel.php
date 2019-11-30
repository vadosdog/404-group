<?php


namespace App\Notifications;


use App\Interfaces\MessengerNotificationInterface;
use App\Interfaces\MessengerServiceInterface;
use App\Models\Recipient;

abstract class MessengerChannel
{
	/**
	 * @var MessengerServiceInterface
	 */
	protected $service;

	public function send(Recipient $notifiable, MessengerNotificationInterface $notification)
	{
		$this->service->send($notification);
	}
}
