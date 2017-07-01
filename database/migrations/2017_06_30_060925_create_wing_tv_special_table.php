<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWingTvSpecialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tv_special', function(Blueprint $table)
		{
			$table->integer('sp_id', true);
			$table->string('sp_name')->default('')->comment('专题名称');
			$table->string('sp_desc')->default('')->comment('专题简介');
			$table->string('sp_pic')->default('')->comment('专题封面图片');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wing_tv_special');
	}

}
