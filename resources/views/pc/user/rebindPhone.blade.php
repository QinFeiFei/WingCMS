@extends('pc.layouts.user')
@section('title', '基本资料')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/useraccount.css">
    <script src="//cdn.bootcss.com/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="//cdn.bootcss.com/layer/3.0.3/layer.min.js"></script>
@endsection

@section('content')
    @include('pc.user._nav', ['navpos'=>'two'])
    <div class="main main_position clearfix">
        @include('pc.user._leftBar')
        <div class="account_right">
            <h2 class="pf">修改手机</h2>

            @if(!empty(session('success', '')))<p class="msg_ok">{{ session('success') }}</p>@endif
            @if(!empty(session('error', '')))<p class="msg_err">{{ session('error', '') }}</p>@endif

            <div class="styleMod">
                <span class="blueTxt">您当前绑定的手机为：{{ $user->phone }}</span><a href="javascript:" id="showbind">修改绑定</a>
            </div>

            <div class="styleMod">提示：绑定手机可以用来做您的<b style="margin:0px;">登录帐号</b>与<b>找回密码</b></div>

            <!--绑定手机-->
            <div class="box_mod w500" id="bindDiv" style="display:none;height:440px;">
                <div class="box_mod_tit"><span>修改手机</span><a class="btn_box_close" href="javascript:"></a></div>
                <div class="boxCon">
                    <div class="ts-wrap">
                        <p class="tsTxt">温馨提示：请输入您要修改的手机号码，可用该手机做您的 登陆帐号与找回密码。</p>
                        <p id="binddiverror" style="color:red;line-height: 35px; text-align: center;"></p>
                    </div>
                    <ul class="conUl">
                        <form id="bindform" method="POST" action="{{ route('pc::userReBindPhone') }}">
                        {{ csrf_field() }}
                        <li>
                            <span class="conTit">确认密码：</span>
                            <div class="coninput w195">
                                <input class="defaultInput" type="password" id="password" name="password" placeholder="请输入您的登陆密码" />
                            </div>
                        </li>
                        <li>
                            <span class="conTit">新手机：</span>
                            <div class="coninput w195">
                                <input class="defaultInput" type="text" id="phone" name="phone" placeholder="请输入新手机号码" />
                            </div>
                            <!--<input style="cursor: pointer;" class="messCode" id="btnSendCode" type="button" value="发送验证码" onclick="sendMessage()" />-->
                        </li>
                        <!--
                        <li>
                            <span class="conTit">验证码：</span>
                            <div class="coninput w195">
                                <input class="defaultInput" type="text" id="code" name="code" placeholder="请输入6位验证码" />
                            </div>
                        </li>
                        -->
                        </form>
                    </ul>
                    <input type="submit" class="btn-tj" id="submit" value="修改绑定" style="border:none;cursor: pointer;" />

                    <div class="mt17">
                        <p class="Noemail">我没收到短信,怎么办?</p>
                        <p class="ifTxt">1、请检查手机号码是否正确<br />2、检查短信垃圾箱，添加白名单后再点击，若仍未收到，请稍后重新点击发送。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script>
  // 联系电话(手机/电话皆可)验证
  jQuery.validator.addMethod("isMobile", function(value,element) {
    var length = value.length;
    var mobile = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1})|(14[0-9]{1}))+\d{8})$/
    return this.optional(element) || (length == 11 && mobile.test(value))
  }, "请正确填写您的手机号");


  // 发送短信验证码
    var InterValObj;    // timer变量，控制时间
    var count = 60;     // 间隔函数，1秒执行
    var curCount;       // 当前剩余秒数
    function sendMessage() {
        if(! $('#bindform').valid()){ return false; }
        $('#binddiverror').html('')
        curCount = count;
        //设置button效果，开始计时
        $("#btnSendCode").attr("disabled", "true");
        $("#btnSendCode").css("cursor", "not-allowed");
        $("#btnSendCode").val(curCount + " 'S");
        InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
        $.ajax({
            type: "post",
            dataType: "json",
            url: '{{ route('api::sendMail') }}',
            data: {
                'type' : 'rebindPhone',
                'phone': $('#phone').val()
            },
            success: function (response){
                if(response.code != 0){
                    layer.msg(response.msg, {icon: 2});
                }else{
                    layer.msg(response.msg);
                }
            },
            error: function () {
                alert(arguments[1]);
            }
        });
    }
    //timer处理函数
    function SetRemainTime() {
        if (curCount == 0) {
            window.clearInterval(InterValObj);
            $("#btnSendCode").removeAttr("disabled");
            $("#btnSendCode").css("cursor", "pointer");
            $("#btnSendCode").val("点击获取");
        }else {
            curCount--;
            $("#btnSendCode").css("cursor", "not-allowed");
            $("#btnSendCode").val(curCount + " 'S");
        }
    }


    $(function () {
        // 验证
        $('#bindform').validate({
            errorPlacement: function(error, element){
                $('#binddiverror').html(error);
            },
            rules : {
                phone: {
                    required : true,
                    isMobile: true,
                    remote   : {
                        url : '{{ route('pc::registerCheck') }}',
                        type: 'get',
                        data:{
                            type  : 'phone',
                            value : function(){
                                return $('#phone').val();
                            }
                        }
                    }
                }
            },
            messages : {
                phone : {
                    required : '手机号码必填',
                    isMobile: "手机格式错误",
                    remote: "手机已被占用"
                }
            }
        });

        $('#submit').click(function () {
            $('#bindform').submit()
        });


        // 关闭弹层
        $('.btn_box_close').click(function () {
            layer.closeAll();
        });

        // 立即绑定
        $('#showbind').click(function () {
            layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                shadeClose: true,
                content: $('#bindDiv')
            });
        });
    })
</script>
@endsection