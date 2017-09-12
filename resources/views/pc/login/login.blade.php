<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>用户中心-登录</title>
    <meta name="Keywords" content=""/>
    <meta name="Description" content=""/>
    <link rel="stylesheet" type="text/css" href="{{ asset('pc/css/login_global.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pc/css/userlogin-4.css') }}">
    <script src="//cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/jquery-validate/1.17.0/jquery.validate.min.js"></script>
</head>
<body>

<!--头部 begin-->
<div class="pheader-col">
    <div class="logo-wrap clearfix">
        <a class="logoPic" href="/"><img width="203" height="71" title="" alt="" src="{{ asset('pc/images/header_logo.png') }}"></a>
    </div>
</div>
<!--头部 end-->
<!--主体 begin-->
<div class="login_wrap">
    <div class="login_center clearfix">
        <div class="imgSlider">
            <ul id="listBox" class="swi_img">
                <li class="active"><a href=""><img src="{{ asset('pc/images/login-link1.jpg') }}" /></a></li>
            </ul>
        </div>
        <div class="login_box mt40">
            <div class="g-login">
                <div class="posti-wrap">
                    <div class="g-login-th clearfix">
                        <span class="sMark" id="quicklogintip" style="display: none">快速登录</span>
                        <span class="sMark" id="otherlogintip">2345帐号登录</span>
                    </div>
                </div>
                <!--posti-wrap end-->
                <div class="g-login-tb clearfix" id="J-formLogin">
                    <form id="myForm" name="myForm">
                        {{ csrf_field() }}

                        <!--2345帐号登录 开始-->
                        <div class="g-login-form loginMod " id="otherlogindiv">
                            <div class="g-inputTxt g-userName">
                                <i class="g-icon-name"></i>
                                <span class="sDes"></span>
                                <input class="ipt-txt-user" placeholder="手机/已验证邮箱/用户名" type="text" name="username" id="username" maxlength="40" autocomplete="off" />
                                <p class="error"></p>
                            </div>
                            <div class="g-inputTxt g-pwd">
                                <i class="g-icon-password"></i>
                                <span class="sDes"></span>
                                <input class="ipt-txt-user" placeholder="请输入密码" type="password" name="password" id="password" autocomplete="off" />
                                <p class="error"></p>
                            </div>
                            <div class="g-login-code" id="form-item-yzm" style="">
                                <div class="g-inputTxt">
                                    <span class="sDes postDes"></span>
                                    <input type="text" id="captcha" placeholder="请输入验证码" name="captcha"  autocomplete="off">
                                    <p class="error"></p>
                                </div>
                                <div class="codePic">
                                    <span class="sPic g-left">
                                        <img style="cursor: pointer" onclick="this.src = this.src + '?' + Math.random();" src="{{ captcha_src() }}" width="88" height="36" id="pic">
                                    </span>
                                    <a href="javascript:;" onclick="document.getElementById('pic').src = document.getElementById('pic').src + '?' + Math.random();" class="g-right">换一张</a>
                                </div>
                            </div>
                            <div class="g-txt g-next">
                                <span class="g-sCheck g-left">
                                    <a href="{{ route('pc::register') }}" class="g-txt-login-btn"><em>立刻</em>注册</a>
                                </span>
                                <a href="{{ route('pc::findPassword') }}" class="g-right">找回密码</a>
                            </div>
                            <input type="button" id="submit" class="g-btn" value="登&nbsp;&nbsp;&nbsp;&nbsp;录">
                            <div class="g-error" id='form-tips-error' style="display:none;"></div>

                            <!--
                            <div class="g-other-login">
                                <span class="sTit">第三方登录：</span>
                                <div class="otherStyle">
                                    <a href=""><i class="g-icon-qq"></i></a>
                                    <a href="" target="_blank"><i class="g-icon-weixin"></i></a>
                                </div>
                            </div>
                            -->
                        </div>
                    </form>
                    <!--2345帐号登录 结束-->
                </div>
            </div>
        </div>
        <!--login_box end-->
    </div>
    <!--login_center end-->
</div>
<!--login_wrap end-->
<!--主体 end-->
<!--底部 begin-->
<div class="footer">
    <div class="footerCon">
        <a href="http://www.2345.com/about/about.htm" target="_blank" onclick="cc('L14')">关于2345</a><em>|</em>
        <a href="http://www.2345.com/about/socially.htm" target="_blank" onclick="cc('L15')">公益</a><em>|</em>
        <a href="/declare.html" target="_blank" onclick="cc('L16')">隐私声明</a><em>|</em>
        <a href="http://www.2345.net/join_us/" target="_blank" onclick="cc('L17')">诚聘英才</a><em>|</em>&nbsp;版权所有&nbsp;&copy;&nbsp;2345.com&nbsp;
        <a href="http://www.2345.com/icp.jpg" target="_blank" onclick="cc('L18')">ICP证沪B2-20120099</a>&nbsp;诚信上网&nbsp;规范经营
    </div>
</div>
<!--底部 end-->

<script>
    $(function(){
        $(function(){
            $('#myForm').validate({
                errorPlacement: function(error, element){
                    // $(element).parent().find('.error').html(error);
                    $('.g-error').html(error).show();
                },
                rules : {
                    username : {
                        required: true
                    },
                    password : {
                        required: true
                    },
                    captcha : {
                        required: true
                    }
                },
                messages : {
                    username : {
                        required : '用户名不能为空'
                    },
                    password : {
                        required : '密码不能为空'
                    },
                    captcha : {
                        required : '验证码不能为空'
                    }
                }
            });

            $('#submit').click(function(){
                $('.g-error').hide();

                if(! $("#myForm").valid()){ return false; }
                $.ajax({
                    type: "POST",
                    url: "{{ route('pc::login') }}",
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
                            window.location.href = '{{ loginReferer(request()->header('referer')) }}'
                        }
                    }
                });
            })
        });
    });
</script>
</body>
</html>