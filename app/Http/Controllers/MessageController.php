<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Recipient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
	public function createMessage(Request $request)
	{
		$this->validate($request, [
			'send_at' => ['date', 'after_or_equal:now'],
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
		}
		DB::commit();

		return 'ok'; //TODO Make resource
	}
}
