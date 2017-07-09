<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin', function(Blueprint $table)
		{
			$table->integer('admin_id', true);
			$table->string('admin_name')->default('')->comment('管理员名称');
			$table->string('admin_aliasname')->default('')->comment('管理员笔名');
			$table->string('admin_password')->default('')->comment('密码');
			$table->string('admin_email')->default('')->comment('管理员邮箱');
			$table->string('admin_is_super')->default('0')->comment('是否超级管理员');
			$table->integer('admin_gid')->default(0)->comment('权限组ID');
			$table->dateTime('admin_last_logintime')->comment('最后一次登陆时间');
			$table->integer('admin_admin_loginnum')->default(0)->comment('登陆次数');
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
		Schema::drop('wing_admin');
	}

}
