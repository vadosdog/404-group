<?php


namespace App\Factories;


use App\Interfaces\MessengerNotificationInterface;
use App\Models\Recipient;
use App\Notifications\TelegramMessengerNotification;
use App\Notifications\ViberMessengerNotification;
use App\Notifications\WhatsupMessengerNotification;
use \Exception;

class NotificationFactory
{
	protected static $notification = [
		'viber' => ViberMessengerNotification::class,
		'whatsup' => WhatsupMessengerNotification::class,
		'telegram' => TelegramMessengerNotification::class,
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
