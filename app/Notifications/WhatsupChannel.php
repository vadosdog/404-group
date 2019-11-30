<?php


namespace App\Notifications;


use App\Services\WhatsupService;

class WhatsupChannel extends MessengerChannel
{
	public function __construct(WhatsupService $service)
	{
		$this->service = $service;
	}
}
