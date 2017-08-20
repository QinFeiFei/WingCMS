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
            $table->string('code')->default('')->comment('校验码');
            $table->enum('send_type', ['email', 'phone', 'wechat'])->default('email')->comment('发送消息类型');
            $table->string('send_form')->default('')->comment('接收者的帐号（手机号/微信号/邮箱号）');
            $table->integer('send_time')->default(0)->comment('发送时间');
            $table->integer('verify_time')->default(0)->comment('验证时间');
            $table->string('send_content_type')->default('')->comment('发送消息类型');
            $table->string('ip')->default('')->comment('发送IP');
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