<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * Class Recipient
 *
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property integer $message_id
 * @property Message $message
 * @property Carbon $send_at
 * @property Carbon|null $sent_at
 * @property integer $attempts
 * @property string $service
 * @property string $uid
 * @property integer $status
 * @package App\Models
 */
class Recipient extends Model
{
	use SoftDeletes;
	use Notifiable;

	const STATUS_PENDING = 1;
	const STATUS_SUCCESS = 2;
	const STATUS_FAILED = 3;

	protected $fillable = [
		'message_id',
		'send_at',
		'service',
		'uid',
	];

	protected $dates = ['send_at', 'sent_at'];

	protected $casts = [
		'id' => 'integer',
		'message_id' => 'integer',
		'attempts' => 'integer',
		'status' => 'integer'
	];

	protected $attributes = [
		'status' => self::STATUS_PENDING
	];

	public function message()
	{
		return $this->belongsTo(Message::class);
	}
}
