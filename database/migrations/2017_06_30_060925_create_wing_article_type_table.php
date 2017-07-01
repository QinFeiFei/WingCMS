<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWingArticleTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_type', function(Blueprint $table)
		{
			$table->integer('type_id', true);
			$table->string('type_name')->default('')->comment('分类名称');
			$table->integer('type_pid')->default(0)->comment('父级ID');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wing_article_type');
	}

}
