<?php


namespace App\Notifications;


use App\Interfaces\MessengerNotificationInterface;
use App\Models\Recipient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;

abstract class MessengerNotification extends Notification implements MessengerNotificationInterface, ShouldQueue
{
	use Queueable;
	use InteractsWithQueue;

	public $tries;

	/**
	 * @var Recipient
	 */
	protected $recipient;

	public function __construct(Recipient $recipient)
	{
		$this->recipient = $recipient;
		$this->delay = 10; //config
		$this->tries = 5; //config
	}

	protected function getMessage()
	{
		return $this->recipient->message;
	}

	public function validate()
	{
		// TODO: Implement validate() method.
	}

	public function getRecipient(): Recipient
	{
		return $this->recipient;
	}

	public function failed()
	{
		$this->recipient->status = Recipient::STATUS_FAILED;
		$this->recipient->save();
	}

	public function success()
	{
		$this->recipient->status = Recipient::STATUS_SUCCESS;
		$this->recipient->save();
	}

}
