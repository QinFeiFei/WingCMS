<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWingTvSpecialManyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tv_special_many', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('tv_id')->nullable();
			$table->integer('sp_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wing_tv_special_many');
	}

}
