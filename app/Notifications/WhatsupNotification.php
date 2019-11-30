<?php


namespace App\Notifications;


class WhatsupNotification extends MessengerNotification
{

	public function via($notifiable)
	{
		return [WhatsupChannel::class];
	}

	public function toWhatsup($notifiable)
	{
		return $this->getMessage();
	}

	public function validate()
	{
		//validation rules
	}
}
