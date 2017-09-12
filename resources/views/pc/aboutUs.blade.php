@extends('pc.layouts.home')
@section('head')
    <link rel="stylesheet" href="{{ asset('/pc/css') }}/explanation.css">
@endsection

@section('content')
    <div class="wrapper">
        <div class="main clearfix">
            <div class="col_a">
                @include('pc.layouts.helpRight')
            </div>
            <div class="col_b">
                <div class="txt">
                    <h1 class="tit">关于我们</h1>
                    <p class="pIntro">2345影视（kan.2345.com），上海二三四五网络科技有限公司（A股上市公司，股票代码002195）旗下网站。2345影视经过长期的发展，始终致力于解决及完善用户在网上看视频时遇到的各种需求，现在已经非常成熟，在视频网站用户中形成了良好的口碑，奠定了坚实且庞大的用户基础。
                        <br>2345影视汇聚了全中国几乎所有主流视频网站的视频资源，经过精心整理重构，形成中国领先的视频数据库，通过搜索、推荐等方式，让用户一站式的了解所有能看到的视频，并能通过我们提供的各种工具，快速找到想看的视频。</p></div>
            </div>
        </div>
    </div>
@endsection