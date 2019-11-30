<?php


namespace App\Notifications;


use App\Services\TelegramService;

class TelegramChannel extends MessengerChannel
{
	public function __construct(TelegramService $service)
	{
		$this->service = $service;
	}
}
