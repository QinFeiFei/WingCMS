<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserWatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_watch', function(Blueprint $table)
		{
			$table->integer('watch_id', true);
			$table->integer('user_id')->default(0);
			$table->integer('tv_id')->default(0);
			$table->integer('watch_nums')->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_watch');
	}

}
