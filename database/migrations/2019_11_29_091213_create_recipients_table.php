<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipients', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->integer('message_id')->index();
			$table->timestamp('sent_at')->nullable();
			$table->integer('attempts')->default(0);
			$table->enum('service', ['whatsup', 'telegram', 'viber']);
			$table->string('uid');
			$table->index(['service', 'uid']);
			$table->timestamp('deleted_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('recipients');
	}
}
