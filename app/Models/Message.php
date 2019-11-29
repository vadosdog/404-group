<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 *
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property Carbon $send_at
 * @property string $message
 *
 * @package App\Models
 */
class Message extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'send_at',
		'message',
	];

	protected $dates = ['send_at'];

	protected $casts = [
		'id' => 'integer',
	];

	public function recipients()
	{
		return $this->hasMany(Recipient::class);
	}
}
