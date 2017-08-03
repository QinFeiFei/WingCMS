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
            <div class="g-error" style="margin-top:30px;padding-left:50px;color:red;display:none;"></div>
            <div class="loginCon">
                <div class="con" id="tel-con">
                    <form id="myFormPhone">
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
                                    <span class="sCheck"><input type="checkbox" checked class="checkbox" id="agree" name="agree">我同意<a href="/licence.html" target="_blank">《服务协议》</a>、<a href="/declare.html" target="_blank">《隐私声明》</a></span>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">&nbsp;</span>
                                <div class="formCon">
                                    <a class="btnStyle" href="javascript:;" id="submit_1">立即注册</a>
                                </div>
                            </li>
                            <li class="mtb12">
                                <span class="sTit">&nbsp;</span>
                                <!--<div class="formCon fontStyle">您还可以使用 <a class="btn-email" href="javascript:">邮箱注册</a></div>-->
                            </li>
                        </ul>
                    </form>
                </div>
                <!--
                <div class="con" id="email-con" style="display:none;">
                    <form id='myFormEmail' method='post' onsubmit="return checkAll('email');">
                        <ul class="ulForm clearfix">
                            <li>
                                <span class="sTit">邮箱：</span>
                                <div class="tips" id="msg_username_email" style="display:none"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="username" type="text" id='username_email' value="" autocomplete='off' >
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">密码：</span>
                                <div class="tips" id='msg_pwd_email' style="display: none"><span class="sError"></span></div>
                                <div class="tips" id='pwd_strong_email' style="display: none;">
                                    <p class="pPasswordHard level4"><em>密码强度</em><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i><em class="emStyle">极强</em></p>
                                    <input name="pwd_strength_email" type="hidden" id="pwd_strength_email" value="1">
                                </div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="password" id="password_email" type="password" maxlength="16" autocomplete='off' >
                                        <i class="iRight" style="display: none"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">请确认密码：</span>
                                <div class="tips" id='msg_repassword_email' style="display: none"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="repassword" id='repassword_email' type="password" maxlength="16" autocomplete='off' >
                                        <i class="iRight" style="display: none"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">图片验证码：</span>
                                <div class="tips" id="msg_validate_email" style="display: none"><span class="sError">验证码不能为空</span></div>
                                <div class="formCon">
                                    <div class="loginCode">
                                        <div class="inputTxt">
                                            <input name="validate" id="validate_email" type="text" value="" autocomplete='off'>
                                            <i class="iRight" style="display: none"></i>
                                        </div>

                                        <div class="loginCode">
                                            <div class="inputTxt">
                                                <input name="captcha" class="captcha" type="text" >
                                                <i class="iRight" style="display: none"></i>
                                            </div>
                                            <img style="cursor: pointer" onclick="this.src = this.src + '?' + Math.random();" src="{{ captcha_src() }}" height="38" class="aMessageCode pic">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">&nbsp;</span>
                                <div class="tips" id="msg_agree_email"><span class="sError"></span></div>
                                <div class="formCon">
                                    <span class="sCheck">
                                        <input type="checkbox" checked class="checkbox" id="agree_email" name="agree">我同意
                                        <a href="/licence.html" target="_blank">《服务协议》</a>、
                                        <a href="/declare.html" target="_blank">《隐私声明》</a>
                                    </span>
                                </div>
                            </li>
                            <input name="reg_type" type="hidden" id='reg_type_email' value="username" />
                            <li>
                                <span class="sTit">&nbsp;</span>
                                <div class="formCon">
                                    <a type="button" class="btnStyle" href="javascript:void(0)">立即注册</a>
                                </div>
                            </li>
                            <li class="mtb12">
                                <span class="sTit">&nbsp;</span>
                                <div class="formCon fontStyle">返回 <a class="btn-tel" href="javascript:">用户名注册</a></div>
                            </li>
                        </ul>
                    </form>
                </div>
                -->
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
    $(".btn-email").bind("click",function()
    {
        $(".con").hide();
        $("#email-con").show();
    });
    $(".btn-tel").bind("click",function()
    {
        $(".con").hide();
        $("#tel-con").show();
    });
</script>
<script>
    jQuery.validator.addMethod("realusername", function(value, element) {
        return this.optional(element) ||  /^[\u0391-\uFFE5|a-zA-Z|0-9]{3,20}$/.test(value);
    }, "8-20位字符，支持汉字、数字、字母及“-””_“组合");

    jQuery.validator.addMethod("numusername", function(value, element) {
        var reg = /^[0-9]*$/;
        return !reg.test(value);
    }, "用户名不能是纯数字");

    $(function(){
        $(function(){
            $('#myFormPhone').validate({
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
                if(! $("#myFormPhone").valid()){ return false; }
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
                            window.location.href = '{{ request()->header('referer') }}'
                        }
                    }
                });
            })
        });
    });
</script>
</body>
</html>