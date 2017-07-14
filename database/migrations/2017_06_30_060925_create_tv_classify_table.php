<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTvClassifyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tv_classify', function(Blueprint $table)
		{
			$table->integer('classify_id', true);
            $table->integer('classify_key')->default(0)->comment('类型Key');
			$table->string('classify_name')->default('')->comment('类型名称');
			$table->integer('tv_id')->default(0);
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
		Schema::drop('wing_tv_type');
	}
}
