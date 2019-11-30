<?php


namespace App\Notifications;


use App\Interfaces\MessengerNotificationInterface;
use App\Models\Recipient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

abstract class MessengerNotification extends Notification implements MessengerNotificationInterface, ShouldQueue
{
	use Queueable;
	/**
	 * @var Recipient
	 */
	protected $recipient;

	public function __construct(Recipient $recipient)
	{
		$this->recipient = $recipient;
	}

	protected function getMessage()
	{
		return $this->recipient->message;
	}

	public function via($notifiable)
	{
		return [MessengerChannel::class];
	}

	public function toMessenger($notifiable)
	{
		return $this->getMessage();
	}

	public function validate()
	{
		//validation rules
	}
}
