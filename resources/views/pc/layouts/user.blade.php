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
<a href="javascript:;" class="rightQR" style="margin-top: 380px;">
    <span class="closeQR" href="javascript:;"></span>
</a>
<!--右侧二维码 end-->

<!--右侧意见反馈 start-->
<!--<a href="" class="feedback" id="feedback" target="_blank"></a>-->
<!--右侧意见反馈 end-->

@include('pc.layouts.bottom_login')

@yield('footer')
<script>
    $('#user-logout').click(function(){
        $.get('{{ route('pc::logout') }}', function(){
            window.location.href = '/'
        });
    });

    $('.closeQR').click(function () {
      $('.rightQR').hide();
    });
</script>

</div>
</body>
</html>