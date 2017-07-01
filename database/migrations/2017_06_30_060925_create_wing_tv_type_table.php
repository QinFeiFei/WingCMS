<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWingTvTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tv_type', function(Blueprint $table)
		{
			$table->integer('type_id', true);
			$table->string('type_name')->default('')->comment('类型名称');
			$table->integer('tv_id')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wing_tv_type');
	}

}
