<?php


namespace App\Factories;


use App\Interfaces\MessengerNotificationInterface;
use App\Models\Recipient;
use App\Notifications\TelegramNotification;
use App\Notifications\ViberNotification;
use App\Notifications\WhatsupNotification;
use \Exception;

class NotificationFactory
{
	protected static $notification = [
		'viber' => ViberNotification::class,
		'whatsup' => WhatsupNotification::class,
		'telegram' => TelegramNotification::class,
	];

	/**
	 * @param Recipient $recipient
	 * @return MessengerNotificationInterface
	 * @throws Exception
	 */
	public static function createNotification(Recipient $recipient): MessengerNotificationInterface
	{
		if (!$notificationClass = self::$notification[$recipient->service] ?? null) {
			throw new Exception('unknown messenger');
		}

		return new $notificationClass($recipient);
	}
}
