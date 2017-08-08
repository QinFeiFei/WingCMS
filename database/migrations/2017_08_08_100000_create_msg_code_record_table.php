<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMsgCodeRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msg_code_record', function (Blueprint $table) {
            $table->integer('record_id', true);
            $table->integer('user_id')->default(0)->comment('会员id');
            $table->string('code')->default('')->comment('校验码');
            $table->enum('send_type', ['email', 'phone', 'wechat'])->default('email')->comment('发送消息类型');
            $table->string('send_form')->default('')->comment('接收者的帐号（手机号/微信号/邮箱号）');
            $table->integer('send_time')->default(0)->comment('发送时间');
            $table->integer('verify_time')->default(0)->comment('验证时间');
            $table->string('return_content')->default('')->comment('第三方接口返回值');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msg_code_record');
    }
}