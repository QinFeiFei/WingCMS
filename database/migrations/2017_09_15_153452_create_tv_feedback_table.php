<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTvFeedbackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tv_feedback', function(Blueprint $table)
		{
			$table->integer('fb_id', true);
			$table->integer('tv_id')->default(0);
			$table->string('tv_name')->default('')->comment('影视名称');
			$table->integer('user_id')->default(0);
			$table->string('username')->default('')->comment('反馈人');
			$table->boolean('is_handle')->default(0)->comment('是否已解决 0 1');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tv_feedback');
	}

}
