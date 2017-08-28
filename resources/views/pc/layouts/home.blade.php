<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie6"><![endif]-->
<!--[if IE 7 ]>
<html class="ie7"><![endif]-->
<!--[if IE 8 ]>
<html class="ie8"><![endif]-->
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]>
<html><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="Keywords" content="@yield('keywords')" />
    <meta name="Description" content="" />
    <meta name="application-name" content="" />
    <meta name="msapplication-task" content="name=影视;action-uri=http://kan.2345.com/;icon-uri=http://kan.2345.com/favicon.ico">
    <meta name="msapplication-task" content="name=电影;action-uri=http://dianying.2345.com/;icon-uri=http://kan.2345.com/favicon.ico">
    <meta name="msapplication-task" content="name=电视剧;action-uri=http://tv.2345.com/;icon-uri=http://kan.2345.com/favicon.ico">
    <meta name="msapplication-task" content="name=动漫;action-uri=http://dongman.2345.com/;icon-uri=http://kan.2345.com/favicon.ico">
    <meta name="msapplication-task" content="name=综艺;action-uri=http://kan.2345.com/zongyi/;icon-uri=http://kan.2345.com/favicon.ico">
    <meta name="msapplication-task" content="name=专题;action-uri=http://kan.2345.com/zt/;icon-uri=http://kan.2345.com/favicon.ico">
    <link rel="canonical" href="{{ env('APP_URL') }}"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <meta content="telephone=no" name="format-detection"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="applicable-device" content="pc,mobile">
    <link href="{{ asset('pc/css') }}/global_v4.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('pc/css') }}/home_v4.css" rel="stylesheet" type="text/css"/>
    <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/vue/2.4.2/vue.min.js"></script>
    <script src="//cdn.bootcss.com/layer/3.0.3/layer.min.js"></script>
    @yield('head')
</head>
<body class="body_1280">
<div id="app">
@include('pc.layouts.top')

@yield('content')

@include('pc.layouts.bottom')
@include('pc.layouts.right_fixed')
@yield('footer')
</div>
</body>
</html>