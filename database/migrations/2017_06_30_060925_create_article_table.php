<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article', function(Blueprint $table)
		{
			$table->integer('article_id', true);
			$table->integer('type_id')->default(0)->comment('文章栏目ID');
			$table->string('article_title')->default('')->comment('文章标题');
			$table->string('article_shorttitle')->default('')->comment('短标题');
			$table->string('article_img')->default('');
			$table->string('article_abstract')->default('')->comment('文章简介');
			$table->string('article_seo_title')->default('')->comment('SEO Title');
			$table->string('article_seo_description')->default('')->comment('SEO 描述');
			$table->string('article_seo_keywords')->default('')->comment('SEO Keywords');
			$table->string('article_duty_admin')->default('')->comment('责任编辑（JSON：管理员ID、笔名）');
			$table->string('article_from_user')->default('')->comment('投稿用户（JSON：用户ID、用户名）');
			$table->string('article_source')->default('')->comment('文章来源（JSON：来源网址、网站名称）');
			$table->string('article_tags')->default('')->comment('文章标签（标签名称）');
			$table->integer('article_soft')->default(255)->comment('排序');
			$table->string('is_publish')->default('0')->comment('是否发布（0草稿 1发布）');
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
		Schema::drop('wing_article');
	}

}
