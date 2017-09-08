<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner', function(Blueprint $table)
		{
			$table->increments('banner_id')->comment('id');
			$table->string('banner_title')->default('')->comment('Banner图片说明');
			$table->string('banner_src')->default('')->comment('Banner文件名');
			$table->boolean('banner_sort')->default(0)->comment('Banner排序0-255');
			$table->string('banner_url')->default('')->comment('Banner图片链接');
			$table->string('banner_bgcolor')->default('')->comment('Banner背景填充色');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banner');
	}

}
