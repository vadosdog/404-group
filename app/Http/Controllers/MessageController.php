<?php

namespace App\Http\Controllers;

use App\Factories\NotificationFactory;
use App\Models\Message;
use App\Models\Recipient;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
	/**
	 * @param Request $request
	 * @return string
	 * @throws ValidationException
	 * @throws Exception
	 */
	public function createMessage(Request $request)
	{
		$this->validate($request, [
			'send_at' => ['date_format:Y-m-d H:i:s', 'after_or_equal:now'],
			'message' => ['required'],
			'recipients' => ['required', 'array'],
			'recipients.*.service' => ['required', 'in:whatsup,telegram,viber'], //TODO in validator
			'recipients.*.uid' => ['required'],
		]);

		DB::beginTransaction();
		$message = new Message();
		$message->fill($request->only(['send_at', 'message']));
		$message->save();

		foreach ($request->input('recipients') as $recipientData) {
			$recipient = new Recipient();
			$recipient->fill($recipientData);
			if ($request->has('send_at')) {
				$recipient->send_at = $request->input('send_at');
			}
			$recipient->message_id = $message->id;
			$recipient->save();

			$notify = NotificationFactory::createNotification($recipient);

			if ($recipient->send_at) {
				$notify->delay($recipient->send_at);
			}

			$recipient->notify($notify);
		}
		DB::commit();

		return response()->json(['message' => 'ok']); //TODO Make resource
	}
}
