<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTvClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tv_class', function(Blueprint $table)
		{
			$table->integer('tv_class_id', true);
			$table->string('tv_class_name')->default('')->comment('类型名称');
			$table->boolean('tv_type')->default(10)->comment('影视类型');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tv_class');
	}
}
