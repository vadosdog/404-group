<?php


namespace App\Notifications;


use App\Services\ViberService;

class ViberChannel extends MessengerChannel
{
	public function __construct(ViberService $service)
	{
		$this->service = $service;
	}
}
