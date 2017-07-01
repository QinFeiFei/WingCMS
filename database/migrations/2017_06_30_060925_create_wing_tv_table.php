<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWingTvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tv', function(Blueprint $table)
		{
			$table->integer('tv_id', true);
			$table->string('tv_name')->default('')->comment('影视名称');
			$table->string('tv_alias_name')->default('')->comment('影视原名');
			$table->string('tv_brief')->default('')->comment('简短的广告');
			$table->string('tv_description')->nullable()->default('')->comment('剧情介绍');
			$table->string('tv_type')->default('10')->comment('影视类型（10-电影 20-电视剧 30-动漫 40-综艺 50-音乐MV 60-公开课 70-其它短片）');
			$table->string('tv_cover')->default('')->comment('影视封面');
			$table->date('tv_show_date')->comment('上影日期');
			$table->smallInteger('tv_show_year')->unsigned()->default(0)->comment('影视年代');
			$table->string('tv_lang')->default('0')->comment('语言（0-国语 10粤语 20-英语 30-韩语 40-日语 50-法语 60-其它）');
			$table->string('tv_area')->default('')->comment('地区');
			$table->string('tv_actors')->default('')->comment('演员（JSON）');
			$table->string('tv_director')->default('')->comment('导演');
			$table->smallInteger('tv_minute')->unsigned()->default(0)->comment('片长（分钟）');
			$table->string('tv_baidu_url')->default('')->comment('百度分享链接');
			$table->string('tv_baidu_pwd')->default('')->comment('百度分享密码');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wing_tv');
	}

}
