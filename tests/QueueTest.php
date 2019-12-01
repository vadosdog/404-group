<?php

use App\Notifications\MessengerNotification;
use Illuminate\Support\Facades\Queue;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class QueueTest extends TestCase
{
	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function testCreateMessageSuccess()
	{
		Queue::fake();

		Queue::assertNothingPushed();

		$this->post('/message/', [
			'message' => 'test',
			'recipients' => [[
				'service' => 'telegram',
				'uid' => 'kek'
			]]
		]);
		$this->seeStatusCode(200);
		$this->seeJsonStructure([
			'message'
		]);

		Queue::assertPushed(\Illuminate\Notifications\SendQueuedNotifications::class, function ($job) {
			$recipient = $job->notifiables;
			$notification = $job->notification;
			return $recipient instanceof \App\Models\Recipient
					&& $notification instanceof \App\Notifications\TelegramNotification;
		});
	}
}
