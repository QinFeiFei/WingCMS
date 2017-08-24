@extends('pc.layouts.user')
@section('title', '修改密码')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/useraccount.css" />
    <script src="//cdn.bootcss.com/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="//cdn.bootcss.com/layer/3.0.3/layer.min.js"></script>
    <style>
        #btnSendCode { border:none;position:absolute; top:5px; left:313px; cursor:pointer; display:block;background: #333333; color:#fff; width:100px;height:32px;line-height:32px;text-align:center;font-size:12px; }
    </style>
@endsection

@section('content')
    @include('pc.user._nav', ['navpos'=>'two'])
    <div class="main main_position clearfix">
        @include('pc.user._leftBar')
        <div class="account_right">
            <h2 class="pf">修改密码</h2>
            <div class="m-boxB-bd">
                <form class="m-form" id="my-form" method="post" action="">
                    {{ csrf_field() }}
                    @if(!empty(session('success', '')))<p class="msg_ok">{{ session('success') }}</p>@endif
                    @if(!empty(session('error', '')))<p class="msg_err">{{ session('error', '') }}</p>@endif

                    @if(!empty($user->email) || !empty($user->phone))
                        <p style="color:#000;margin-left:20px;">通过您绑定的邮箱 <span style="color:#178fe5">{{ $user->email }}</span> 来修改密码</p>
                    @else
                        <p style="color:red;padding-left:90px;">! 您还没绑定邮箱或手机,请先 <a href="{{ route('pc::userBindEmail') }}">绑定邮箱</a> 或 绑定手机</p>
                    @endif
                    <div class="form-item" style="position:relative;">
                        <span class="form-field ft-bold">验证码：</span>
                        <input class="ipt_txt ipt_defa" type="text" id="code" name="code"  placeholder="请输入六位验证码" />
                        <input id="btnSendCode" type="button" value="点击获取" onclick="sendMessage()" />
                        <span class="form-tips form-tips-error accountError"><i class="icon-error"></i></span>
                    </div>
                    <div class="form-item">
                        <span class="form-field ft-bold">密码：</span>
                        <input class="ipt_txt ipt_defa" type="password" id="password" name="password"  placeholder="请输入要修改的密码" />
                        <span class="form-tips form-tips-error accountError"><i class="icon-error"></i></span>
                    </div>
                    <div class="form-item form-item-radio">
                        <span class="form-field ft-bold">确认密码：</span>
                        <input class="ipt_txt ipt_defa" type="password" id="repassword" name="repassword"  placeholder="请确认要修改的密码" />
                        <span class="form-tips form-tips-error accountError"><i class="icon-error"></i></span>
                    </div>
                    <div class="form-item">
                        <input type="submit" id="submit" class="btn-blueA" value="保存" style="border:0px;cursor:pointer;"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        // 发送短信验证码
        var InterValObj;    // timer变量，控制时间
        var count = 60;     // 间隔函数，1秒执行
        var curCount;       // 当前剩余秒数
        function sendMessage() {
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
                    'type' : 'modPassword',
                    'email': '{{ $user->email }}'
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


        $(function (){
            $('#my-form').validate({
                errorPlacement: function(error, element){
                    $(element).parent().find('.form-tips-error').find('.icon-error').html(error);
                },
                rules : {
                    code : {
                        required: true
                    },
                    password : {
                        required: true,
                        minlength: 5,
                        maxlength: 20
                    },
                    repassword: {
                        required : true,
                        equalTo: '#password'
                    }
                },
                messages : {
                    code : {
                        required : '验证码不能为空'
                    },
                    password : {
                        required : '密码不能为空',
                        minlength: '密码长度为5-20个字符',
                        maxlength: '密码长度为5-20个字符'
                    },
                    repassword : {
                        required : '重复密码不能为空',
                        equalTo: "两次密码输入不一致"
                    }
                }
            });
        })
    </script>
@endsection