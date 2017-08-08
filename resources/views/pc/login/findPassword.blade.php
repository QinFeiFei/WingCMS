<!DOCTYPE HTML>
<html>
<head>
    <meta charset="gb2312" />
    <title>用户中心-找回密码</title>
    <meta content="" name="Description" />
    <meta content="" name="Keywords" />
    <link rel="stylesheet" type="text/css"  href="{{ asset('pc/css/common_1_30.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('pc/css/uc_9_18.css') }}">
    <script src="//cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <style>
        .icon-error { width:250px;height:30px; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="pheader">
        <div class="pheader-col">
            <a class="logo" href="{{ route('pc::index') }}"></a>
            <span style="margin-left:15px;line-height:75px;font-size:20px;color:#66b4ff">| 找回密码</span>
            <div class="userinfo">
                <span class="item"><a href="{{ route('pc::index') }}">首页</a></span>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="m-boxA minHeight">
            <div class="m-boxA-hd">
                <h2 class="m-boxA-tit active" id="tomail">通过邮件找回</h2>
                <!--<h2 class="m-boxA-tit" id="tophone">通过手机找回</h2>-->
                <a class="more" href="{{ route('pc::login') }}">&lt; 返回登录页面</a>
            </div>

            <div class="m-boxA-bd">
                <p>{{ session('error') ? session('error') : '' }}</p>
                <form id="find-form" method="post">
                    <input type="hidden" id="type" value="email" />
                    {{ csrf_field() }}
                    <div class="ucfnBox">
                        <div class="m-form">
                            <div class="form-item mailitem">
                                <span class="form-field">邮箱帐号：</span>
                                <input class="ipt_txt ipt_defa" type="text" id="mail" name="mail"  placeholder="请输入已绑定的邮箱账号" />
                                <span class="form-tips form-tips-error accountError"><i class="icon-error"></i></span>
                            </div>

                            <div class="form-item phoneitem" style="display:none;">
                                <span class="form-field">手机号：</span>
                                <input class="ipt_txt ipt_defa" type="text" id="phone" name="phone"  placeholder="请输入已绑定的手机号" />
                                <span class="form-tips form-tips-error accountError"><i class="icon-error"></i></span>
                            </div>

                            <div class="form-item form-item-yzm">
                                <div class="form-field">验证码：</div>
                                <div class="form-con clearfix">
                                    <input class="ipt_txt ipt-txt-yzm" id="yzmcode" type="text" name="yzmcode" >
                                    <img class="img-yzm clickImg" id="captcha" src="{{ captcha_src() }}" onclick="this.src = this.src + '?' + Math.random();" src="{{ captcha_src() }}">
                                    <a class="trig-link clickImg" href="javascript:;" onclick="document.getElementById('captcha').src = document.getElementById('captcha').src + '?' + Math.random();">换一换</a>
                                    <span class="form-tips form-tips-error codeError"><i class="icon-error"></i></span>
                                </div>
                                <div class="form-tips"></div>
                            </div>

                            <div class="form-item">
                                <a class="btn-blueA commitFindData" id="submit" href="javascript:void(0);">下一步</a>
                                <br>
                                <span class="g-error" style="color:red;"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="pfooter">
    <a href="http://www.2345.com/about/about.htm" target="_blank">关于2345</a><em>|</em><a href="http://bbs.2345.cn/fk/index.htm?cName=%u7528%u6237%u4E2D%u5FC3" target="_blank">错误反馈</a><em>|</em><a href="http://www.2345.com/" target="_blank">标准版</a><em>|</em><a href="http://www.2345.com/j.htm" target="_blank">精简版</a><em>|</em><a href="http://www.2345.com/laonian.htm" target="_blank">老年版</a><em>|</em><a href="http://m.2345.com/pages/" target="_blank">手机版</a><em>|</em><a href="http://www.2345.com/about/gyhd.htm" target="_blank">公益</a><em>|</em>版权所有 &copy; 2345.com <a href="http://www.2345.com/icp.jpg" target="_blank">ICP证沪B2-20120099</a>
</div>

<script>
    $(function (){
        $('#tomail').click(function (){
            $('.mailitem').show();
            $('.phoneitem').hide();
            $('#type').val('email');
        });

        $('#tophone').click(function (){
            $('.mailitem').hide();
            $('.phoneitem').show();
            $('#type').val('phone');
        });


        $('#find-form').validate({
            errorPlacement: function(error, element){
                $(element).parent().find('.form-tips-error').find('.icon-error').html(error);
            },
            rules : {
                mail : {
                    required: true,
                    email: true,
                    remote   : {
                        url : '{{ route('pc::registerCheck') }}',
                        type: 'get',
                        data:{
                            type  : 'remail',
                            value : function(){
                                return $('#mail').val();
                            }
                        }
                    }
                },
                yzmcode : {
                    required: true
                }
            },
            messages : {
                mail : {
                    required : '邮箱不能为空',
                    email: '邮箱格式错误',
                    remote: '该邮箱不存在'
                },
                yzmcode : {
                    required : '验证码不能为空'
                }
            }
        });

        $('#submit').click(function(){
            $('.g-error').hide();

            if(! $("#find-form").valid()){ return false; }

            $('#find-form').submit();
        })
    })
</script>

</body>
</html>