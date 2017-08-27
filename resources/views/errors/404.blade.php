<!DOCTYPE HTML>
<html>
<head>
    <meta charset="gb2312">
    <title>404 没有找到页面</title>
    <link href="{{ asset('pc/css/global.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pc/css/error.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
<!-- head -->
<div class="sheader" id="header">
    <div class="shead">
        <span class="slogo">
            <a href="{{ route('pc::index') }}" target="_self"></a>
        </span>
        <span class="smenu">
            <a href="{{ route('pc::index') }}" target="_self">首页</a>
            <a href="{{ route('pc::tvList', ['type'=>'movie']) }}" target="_self">电影</a>
            <a href="{{ route('pc::tvList', ['type'=>'teleplay']) }}" target="_self">电视剧</a>
            <a href="{{ route('pc::tvList', ['type'=>'cartoon']) }}" target="_self">动漫</a>
            <a href="{{ route('pc::tvList', ['type'=>'variety']) }}" target="_self">综艺</a>
            <a href="{{ route('pc::tvList', ['type'=>'mv']) }}" target="_self">音乐MV</a>
            <a href="{{ route('pc::tvList', ['type'=>'openclass']) }}" target="_self">公开课</a>
            <a href="{{ route('pc::tvList', ['type'=>'other']) }}" target="_self">其它视频</a>
        </span>
    </div>
</div>

<div class="main">

    <!--404页 begin-->
    <div class="g-notfound">
        <div class="g-notfound-cont">
            <div class="g-notfound-btit">这个页面打不开了...</div>
            <div class="g-notfound-tips"><em id='time_out'>5</em>秒后 页面自动跳转至&nbsp;&nbsp;<a class="trig" href="{{ route('pc::index') }}" target="_self">影视首页>></a></div>
        </div>
    </div>
    <!--404页 end-->
    <p class="aboutLinks">
        <em>如果网站有BUG，你也可以向我们 <a href="">反馈问题</a>，或者 <a href="">联系我们</a>。</em>
    </p>
</div>
<script>
    var t=5;
    var url='{{ env('APP_URL') }}';
    setInterval(function(){
        if(t<0){
            window.location.href=url
            return
        }
        document.getElementById('time_out').innerHTML=t
        t-=1;
    },1000);
</script>
</body>
</html>