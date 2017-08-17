<!DOCTYPE HTML>
<html>
<head>
    <meta charset="gb2312" />
    <title>用户中心-设置密码</title>
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
            <span style="margin-left:15px;line-height:75px;font-size:20px;color:#66b4ff">| 重置密码</span>
            <div class="userinfo">
                <span class="item"><a href="{{ route('pc::index') }}">首页</a></span>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="m-boxA minHeight">
            <div class="m-boxA-hd">
                <h2 class="m-boxA-tit active">重置您的密码</h2>
            </div>

            <div class="m-boxA-bd">
                <p style="margin-left:50px;color:red;">{{ session('error') ? session('error') : '' }}</p>
                <form id="find-form" method="post">
                    <input type="hidden" id="type" value="email" />
                    {{ csrf_field() }}
                    <div class="ucfnBox">
                        <div class="m-form">
                            <div class="form-item code" style="position:relative;">
                                <span class="form-field">验证码：</span>
                                <input class="ipt_txt ipt_defa" type="text" id="code" name="code"  placeholder="请输出验证码" />
                                <span style="position:absolute; top:1px; left:298px; cursor:pointer; display:block;background: #333333; color:#fff; width:100px;height:32px;line-height:32px;text-align:center;font-size:12px;">点击获取</span>
                                <span class="form-tips form-tips-error accountError"><i class="icon-error"></i></span>
                            </div>

                            <div class="form-item password">
                                <span class="form-field">密码：</span>
                                <input class="ipt_txt ipt_defa" type="text" id="password" name="password"  placeholder="请输入要修改的密码" />
                                <span class="form-tips form-tips-error accountError"><i class="icon-error"></i></span>
                            </div>

                            <div class="form-item repassword">
                                <span class="form-field">确认密码：</span>
                                <input class="ipt_txt ipt_defa" type="text" id="repassword" name="repassword"  placeholder="请确认要修改的密码" />
                                <span class="form-tips form-tips-error accountError"><i class="icon-error"></i></span>
                            </div>

                            <div class="form-item">
                                <a class="btn-blueA commitFindData" id="submit" href="javascript:void(0);">重置</a>
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