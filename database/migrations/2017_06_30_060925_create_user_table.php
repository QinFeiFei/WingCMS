<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

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
			$table->string('username', 60)->comment('用户名');
			$table->string('password')->default('')->comment('密码');
			$table->string('avatar')->default('')->comment('头像');
			$table->string('email')->default('')->comment('邮箱');
			$table->string('phone')->default('')->comment('手机 ');
			$table->dateTime('last_login')->comment('最后登陆时间');
			$table->string('last_ip')->default('')->comment('最后登陆IP');
            $table->dateTime('register_time')->comment('注册时间');
            $table->string('register_ip')->default('')->comment('注册IP');
			$table->integer('login_num')->default(0)->comment('登陆次数');
			$table->string('register_type')->default('pc');
            $table->unique('username');
            $table->unique('email');
            $table->unique('phone');
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
		Schema::drop('user');
	}

}
