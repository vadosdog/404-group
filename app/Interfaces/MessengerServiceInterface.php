<?php


namespace App\Interfaces;


interface MessengerServiceInterface
{
	public function send(MessengerNotificationInterface $message);
}
