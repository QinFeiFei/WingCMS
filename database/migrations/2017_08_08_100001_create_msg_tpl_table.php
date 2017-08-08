<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMsgTplTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msg_tpl', function (Blueprint $table) {
            $table->integer('msg_tpl_id', true);
            $table->string('msg_code', 60)->comment('模板消息 key');
            $table->string('msg_title')->comment('模板消息标题');
            $table->string('email_tpl_name')->comment('邮件内容_模板名称');
            $table->string('phone_tpl')->comment('手机短信内容');
            $table->string('wechat_tpl')->comment('微信消息内容');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msg_tpl');
    }
}