<!DOCTYPE HTML>
<html>
<head>
    <meta charset="gb2312">
    <title>500 服务器错误</title>
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

    <img src="{{ asset('pc/images/500_error.jpg') }}" style="margin:0 auto;display:block;margin-top:80px;" />
    <!--404页 begin-->
    <div class="g-notfound">
        <div class="">
            <div class="g-notfound-btit">服务器出现错误，程序猿正在抢修...</div>
            <div class="g-notfound-tips"><em id='time_out'>5</em>秒后 页面自动跳转至&nbsp;&nbsp;<a class="trig" href="{{ route('pc::index') }}" target="_self">影视首页>></a></div>
        </div>
    </div>
    <!--404页 end-->
</div>
<script>
    function countDown(secs, surl){
        var jumpTo = document.getElementById('time_out')
        jumpTo.innerHTML = secs
        if(--secs>0){
            setTimeout("countDown("+secs+",'"+surl+"')",1000)
        }
        else{
            location.href = surl
        }
    }

    countDown(5, '{{ env('APP_URL') }}')
</script>
</body>
</html>