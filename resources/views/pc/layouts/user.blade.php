<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta content="" name="Description">
    <meta content="" name="Keywords">
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/global.css">
    <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/vue/2.4.2/vue.min.js"></script>
    <script src="//cdn.bootcss.com/element-ui/1.4.2/index.js"></script>
    <link href="//cdn.bootcss.com/element-ui/1.4.2/theme-default/index.css" rel="stylesheet">
    @yield('head')
</head>
<body>
<div id="app">
<div class="pheader-col">
    <div class="logo-wrap">
        <a class="logo" href="{{ route('pc::index') }}"></a>
    </div>

    <div class="userinfo">
        <span class="item" style="margin-left:5px;"><a href="javascript:void(0)" id="user-logout"> [ 退出 ]</a></span>
        <i class="cut"></i>
        <span class="item">欢迎您，<span class="cBlue">{{ $user->username }}</span></span>
    </div>
</div>

@yield('content')

<!--右侧二维码 start-->
<!--
<a href="javascript:;" class="rightQR" style="margin-top: 380px;">
    <span class="closeQR" href="javascript:;"></span>
</a>
-->
<!--右侧二维码 end-->

<!--右侧意见反馈 start-->
<!--<a href="" class="feedback" id="feedback" target="_blank"></a>-->
<!--右侧意见反馈 end-->

<div class="pfooter mt30">
    <a href="http://www.2345.com/about/about.htm" target="_blank" onclick="cc(&#39;H91&#39;)">关于2345</a><em>|</em>
    <a href="http://bbs.2345.cn/fk/index.htm?cName=%u7528%u6237%u4E2D%u5FC3" target="_blank" onclick="cc(&#39;H92&#39;)">错误反馈</a><em>|</em>
    <a href="http://www.2345.com/" target="_blank" onclick="cc(&#39;H93&#39;)">标准版</a><em>|</em>
    <a href="http://www.2345.com/j.htm" target="_blank" onclick="cc(&#39;H94&#39;)">精简版</a><em>|</em>
    <a href="http://www.2345.com/laonian.htm" target="_blank" onclick="cc(&#39;H95&#39;)">老年版</a><em>|</em>
    <a href="http://m.2345.com/pages/" target="_blank" onclick="cc(&#39;H96&#39;)">手机版</a><em>|</em>
    <a href="http://www.2345.com/about/gyhd.htm" target="_blank" onclick="cc(&#39;H97&#39;)">公益</a><em>|</em>版权所有 <i>&#169;</i> 2345.com
    <a href="http://www.2345.com/icp.jpg" target="_blank" onclick="cc(&#39;H98&#39;)">ICP证沪B2-20120099</a>
</div>
@yield('footer')
<script>
    $('#user-logout').click(function(){
        $.get('{{ route('pc::logout') }}', function(){
            window.location.href = '/'
        });
    });
</script>

</div>
</body>
</html>