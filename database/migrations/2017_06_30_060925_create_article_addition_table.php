<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleAdditionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_addition', function(Blueprint $table)
		{
			$table->integer('addition_id', true);
			$table->integer('article_id')->default(0)->comment('主表ID');
			$table->text('article_content', 65535)->comment('文章内容');
			$table->integer('article_clicks')->unsigned()->default(0)->comment('点击次数');
			$table->dateTime('article_last_click')->comment('文章最后查看时间');
			$table->integer('is_goods')->default(0)->comment('好评');
			$table->integer('is_bads')->default(0)->comment('差评');
			$table->integer('article_comment_counts')->default(0)->comment('文章评论总数');
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
		Schema::drop('wing_article_addition');
	}

}
