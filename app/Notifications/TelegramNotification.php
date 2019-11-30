<?php


namespace App\Notifications;


class TelegramNotification extends MessengerNotification
{
	public function via($notifiable)
	{
		return [TelegramChannel::class];
	}

	public function toTelegram($notifiable)
	{
		return $this->getMessage();
	}

	public function validate()
	{
		//validation rules
	}
}
