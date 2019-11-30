<?php


namespace App\Services;


use App\Interfaces\MessengerNotificationInterface;
use App\Interfaces\MessengerServiceInterface;
use App\Models\Recipient;
use Carbon\Carbon;

class WhatsupService implements MessengerServiceInterface
{
	public function __construct($config)
	{
		//
	}

	public function send(MessengerNotificationInterface $message)
	{
		//EXAMPLE
		/** @var Recipient $recipient */
		$recipient = $message->getRecipient();
		$string = (Carbon::now())->toDateTimeString();
		$string .= ': ' . $recipient->service . ' : ' . $recipient->uid . ' : ' . $recipient->message->message . "\n";
		file_put_contents(storage_path() . '/logs/sended.log', $string, FILE_APPEND);
	}


}
