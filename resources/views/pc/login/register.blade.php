<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <title>用户中心-注册</title>
    <meta name="Description" content="">
    <meta name="Keywords" content="">
    <link rel="stylesheet" href="{{ asset('pc/css/login.css') }}" />
    <script src="//cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="//cdn.bootcss.com/layer/3.0.3/layer.min.js"></script>
    <style>
        #btnSendCode { border:none;position:absolute; top:-1px; left:168px; cursor:pointer; display:block;background: #333333; color:#fff; width:100px;height:40px;line-height:20px;text-align:center;font-size:12px; }
    </style>
</head>
<body>
<div class="header">
    <div class="headerCon">
        <div class="logo">
            <a href="/" class="logoPic">
                <img src="{{ asset('pc/images/logo.png') }}" width="203" height="71">
            </a>
            <span class="sTxt">注册帐号</span>
        </div>
        <p class="pRight">我已有帐号，<a href="{{ route('pc::login') }}">立即登录</a></p>
    </div>
</div>

<div class="wrapper">
    <div class="main clearfix pb25" id="loginForm">
        <div class="col_a">
            <ul class="regtype">
                <li id="btn-email" class="cur">通过邮箱注册</li>
                <li id="btn-tel">通过用户名注册</li>
                <div style="clear:both;"></div>
            </ul>
            <div class="g-error" style="margin-top:15px;padding-left:105px;color:red;display:none;"></div>
            <div class="loginCon">
                <div class="con" id="tel-con" style="display:none;">
                    <form id="myFormUser">
                        <ul class="ulForm clearfix">
                            <li>
                                <span class="sTit">用户名：</span>
                                <div class="tips"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="username" type="text" id="username" value="" autocomplete='off' />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">密码：</span>
                                <div class="tips"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="password" id="password" type="password" maxlength="16" autocomplete='off' >
                                        <i class="iRight" style="display: none"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">请确认密码：</span>
                                <div class="tips"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="repassword" id="repassword" type="password" maxlength="16" autocomplete='off' >
                                        <i class="iRight" style="display: none"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">图形验证码：</span>
                                <div class="tips"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt" style="width:100px !important;display:inline-block">
                                        <input name="captcha" id="captcha" class="captcha" type="text">
                                        <i class="iRight" style="display: none"></i>
                                    </div>
                                    <img style="cursor: pointer;position:relative;top:-15px;" onclick="this.src = this.src + '?' + Math.random();" src="{{ captcha_src() }}" height="38" class="aMessageCode" id="pic">
                                </div>
                            </li>
                            <li>
                                <span class="sTit">&nbsp;</span>
                                <div class="tips"><span class="sError"></span></div>
                                <div class="formCon">
                                    <span class="sCheck"><input type="checkbox" checked class="checkbox" id="agree" name="agree">我同意<a href="{{ route('pc::licence') }}" target="_blank">《服务协议》</a>、<a href="{{ route('pc::declare') }}" target="_blank">《隐私声明》</a></span>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">&nbsp;</span>
                                <div class="formCon">
                                    <a class="btnStyle" href="javascript:;" id="submit_1">立即注册</a>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="con" id="email-con">
                    <form id="myFormEmail">
                        <ul class="ulForm clearfix">
                            <li>
                                <span class="sTit">邮箱：</span>
                                <div class="tips"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt" style="position:relative;">
                                        <input name="email" type="text" id="email" value="" placeholder="请输入您的邮箱" />
                                        <input id="btnSendCode" type="button" value="点击获取" onclick="sendMessage()" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">邮箱验证码：</span>
                                <div class="tips"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="emailCode" id="emailCode" type="text" maxlength="30" placeholder="请输入发送至您邮箱的6位验证码" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">密码：</span>
                                <div class="tips"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="password" id="password" type="password" maxlength="30" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">请确认密码：</span>
                                <div class="tips" id='msg_repassword_email' style="display: none"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="repassword" id="repassword" type="password" maxlength="30" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">图片验证码：</span>
                                <div class="tips"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt" style="width:100px !important;display:inline-block">
                                        <input name="captcha" id="captcha" class="captcha" type="text">
                                        <i class="iRight" style="display: none"></i>
                                    </div>
                                    <img style="cursor: pointer;position:relative;top:-15px;" onclick="this.src = this.src + '?' + Math.random();" src="{{ captcha_src() }}" height="38" class="aMessageCode" id="pic">
                                </div>
                            </li>
                            <li>
                                <span class="sTit">&nbsp;</span>
                                <div class="tips"><span class="sError"></span></div>
                                <div class="formCon">
                                    <span class="sCheck"><input type="checkbox" checked class="checkbox" id="agree" name="agree">我同意<a href="{{ route('pc::licence') }}" target="_blank">《服务协议》</a>、<a href="{{ route('pc::declare') }}" target="_blank">《隐私声明》</a></span>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">&nbsp;</span>
                                <div class="formCon">
                                    <a type="button" class="btnStyle" href="javascript:void(0)">立即注册</a>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <div class="col_b">
            <div class="ivy270">
                <img src="{{ asset('pc/images/local.jpg') }}" width="270" height="340" />
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="footerCon">
        <a href="http://www.2345.com/about/about.htm" target="_blank" >关于2345</a><em>|</em>
        <a href="http://www.2345.com/about/socially.htm" target="_blank" >公益</a><em>|</em>
        <a href="/declare.html" target="_blank" >隐私声明</a><em>|</em>
        <a href="http://www.2345.net/join_us/" target="_blank" >诚聘英才</a><em>|</em>&nbsp;版权所有&nbsp;&copy;&nbsp;2345.com&nbsp;
        <a href="http://www.2345.com/icp.jpg" target="_blank">ICP证沪B2-20120099</a>&nbsp;诚信上网&nbsp;规范经营
    </div>
</div>
<script>
    //邮件注册和手机注册切换
    $("#btn-email").click(function(){
        $(this).parent().find('li').removeClass('cur')
        $(this).addClass('cur')
        $(".con").hide();
        $("#email-con").show();
    });
    $("#btn-tel").click(function(){
        $(this).parent().find('li').removeClass('cur')
        $(this).addClass('cur')
        $(".con").hide();
        $("#tel-con").show();
    });

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
                'type' : 'register',
                'email': $('#email').val()
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

    // 添加检测条件
    jQuery.validator.addMethod("realusername", function(value, element) {
        return this.optional(element) ||  /^[\u0391-\uFFE5|a-zA-Z|0-9]{3,20}$/.test(value);
    }, "8-20位字符，支持汉字、数字、字母及“-””_“组合");

    jQuery.validator.addMethod("numusername", function(value, element) {
        var reg = /^[0-9]*$/;
        return !reg.test(value);
    }, "用户名不能是纯数字");

    $(function(){
        $(function(){
            $('#myFormUser').validate({
                errorPlacement: function(error, element){
                    $(element).parent().parent().parent().find('.tips').find('.sError').html(error);
                },
                rules : {
                    username : {
                        required: true,
                        minlength: 3,
                        maxlength: 20,
                        numusername: true,
                        realusername:true,
                        remote   : {
                            url : '{{ route('pc::registerCheck') }}',
                            type: 'get',
                            data:{
                                type  : 'username',
                                value : function(){
                                    return $('#username').val();
                                }
                            }
                        }
                    },
                    password : {
                        required: true,
                        minlength: 5,
                        maxlength: 20
                    },
                    repassword: {
                        required : true,
                        equalTo: '#password'
                    },
                    captcha : {
                        required: true
                    },
                    agree: {
                        required: true
                    }
                },
                messages : {
                    username : {
                        required : '用户名不能为空',
                        numusername: '用户名不能是纯数字',
                        realusername: '仅只支持：汉字、数字、字母及“-””_“组合',
                        minlength: '用户名长度为3-20个字符',
                        maxlength: '用户名长度为3-20个字符',
                        remote   : '用户名已存在,请尝试其它用户名'
                    },
                    password : {
                        required : '密码不能为空',
                        minlength: '密码长度为5-20个字符',
                        maxlength: '密码长度为5-20个字符'
                    },
                    repassword : {
                        required : '重复密码不能为空',
                        equalTo: "两次密码输入不一致"
                    },
                    captcha : {
                        required : '验证码不能为空'
                    },
                    agree: {
                        required: '请同意协议'
                    }
                }
            });
            $('#submit_1').click(function(){
                $('.g-error').hide();
                if(! $("#myFormUser").valid()){ return false; }
                $.ajax({
                    type: "POST",
                    url: "{{ route('pc::register') }}",
                    data: {
                        username: $("#username").val(),
                        password: $("#password").val(),
                        captcha:  $("#captcha").val(),
                        _token:   '{{ csrf_token() }}'
                    },
                    dataType: "json",
                    success: function(data){
                        if(data.code != 0){
                            document.getElementById('pic').src = document.getElementById('pic').src + '?' + Math.random();
                            $('.g-error').html(data.msg).show();
                        }else{
                            layer.msg('注册成功!', {icon: 6});

                            window.setTimeout(function () {
                                window.location.href = '{{ request()->header('referer') }}'
                            }, 1000)
                        }
                    }
                });
            })
        });
    });
</script>
</body>
</html>