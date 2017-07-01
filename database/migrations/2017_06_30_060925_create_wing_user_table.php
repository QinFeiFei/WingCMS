<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWingUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->integer('user_id', true);
			$table->string('username')->default('')->comment('用户名');
			$table->string('password')->default('')->comment('密码');
			$table->string('avatar')->default('')->comment('头像');
			$table->string('email')->default('')->comment('邮箱');
			$table->string('email_check')->default('0')->comment('邮箱是否已验证');
			$table->string('phone')->default('')->comment('手机 ');
			$table->string('phone_check')->default('0')->comment('手机是否已验证');
			$table->dateTime('last_login')->comment('最后登陆时间');
			$table->string('last_ip')->default('')->comment('最后登陆IP');
			$table->integer('login_num')->default(0)->comment('登陆次数');
			$table->string('register_type')->default('pc');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wing_user');
	}

}
