<?php

namespace App\Jobs;

use App\Models\Recipient;
use Illuminate\Auth\Passwords\PasswordBroker;

class SendMessageJob extends Job
{
	/**
	 * @var Recipient $recipient
	 */
	protected $recipient;

	/**
	 * Create a new job instance.
	 *
	 * @param Recipient $recipient
	 */
	public function __construct(Recipient $recipient)
	{
		$this->recipient = $recipient;
		//
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		dd($this->recipient);


	}
}
