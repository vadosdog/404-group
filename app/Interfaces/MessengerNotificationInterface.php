<?php


namespace App\Interfaces;


interface MessengerNotificationInterface
{
	public function validate();

	public function getRecipient();
}
