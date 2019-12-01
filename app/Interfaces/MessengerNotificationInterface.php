<?php


namespace App\Interfaces;


use App\Models\Recipient;

interface MessengerNotificationInterface
{
	public function validate();

	public function getRecipient(): Recipient;
}
