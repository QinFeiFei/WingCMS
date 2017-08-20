@extends('pc.layouts.user')
@section('title', '第三方授权')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/useraccount.css">
@endsection

@section('content')
<div class="main main_position clearfix">
    <div class="account_left">
        <ul class="account_nav">
            <li><a href="http://login.2345.com/member/editData"><i class="icon-b png24"></i>基本资料</a>
            </li><li><a href="http://login.2345.com/member/editPassword"><i class="icon-c png24"></i>修改密码</a></li>
                        <li><a href="http://login.2345.com/member/editPhone"><i class="icon-d png24"></i>修改手机</a></li>
                                    <li><a href="http://login.2345.com/member/editEmail"><i class="icon-e png24"></i>修改邮箱</a></li>
                        <li><a href="http://login.2345.com/member/avatar/index"><i class="icon-a png24"></i>我的头像</a></li>
            <li><a class="curr_account" href="http://login.2345.com/member/editOauth/index" onclick="cc(&#39;D1&#39;)"><i class="icon-g png24"></i>第三方授权</a></li>
        </ul>
    </div>
<!--主体右侧 开始-->
<div class="account_right" style=" height:500px;">

    <!--第三方授权 开始-->
    <div class="changeThirdparty">
        <h2 class="pf">第三方授权</h2>
        <ul>
            <li>
                <div class="widthLeft"><img src="{{ asset('/pc/user') }}/qq.png" alt=""><span class="c_blue">已授权</span></div>
                <div class="widthCenter">
                    账号：Wing
                </div>
                <a class="btn gray unbind" href="javascript:void(0);">取消授权</a>
            </li>
            <li>
                <div class="widthLeft"><img src="{{ asset('/pc/user') }}/weixin.png" alt=""><span class="c_blue">未授权</span></div>
                <div class="widthCenter"></div>
                <a class="btn blue" href="">获取授权</a>
            </li>
                        
        </ul>
    </div><!--changeEmail-A end-->
    <!--第三方授权 结束-->

</div><!--account_right end-->
<!--主体右侧 结束-->

</div><!--main end-->
<!--主体 end-->
@endsection