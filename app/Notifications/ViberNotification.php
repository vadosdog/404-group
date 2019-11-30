<?php


namespace App\Notifications;

class ViberNotification extends MessengerNotification
{

	public function via($notifiable)
	{
		return [ViberChannel::class];
	}

	public function toViber($notifiable)
	{
		return $this->getMessage();
	}

	public function validate()
	{
		//validation rules
	}
}
