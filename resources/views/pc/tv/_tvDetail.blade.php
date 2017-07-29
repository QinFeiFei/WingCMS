@extends('pc.layouts.home')

@section('head')
    <link rel="stylesheet" href="{{ asset('pc/css') }}/detail_v4.css">
    <style>
        .tabContent { margin:0;padding:0;width:100%;height:auto;border:1px solid #ccc;display:none; }
        .tab { margin:0;padding:0;list-style:none;overflow:hidden; }
        .tab li { float:left;width:60px;height:30px;text-align:center;line-height:30px;cursor:pointer; }
        .on { display:block; }

        .tab .tabLi1.cur { background:blue; }
        .tab .tabLi2.cur { background:red; }
        .tab .tabLi3.cur { background:black; }
        .resource .tabContent1.on { border-color:blue }
        .resource .tabContent2.on { border-color:red }
        .resource .tabContent3.on { border-color:black; }
    </style>
@endsection

@section('content')
    <div class="wrapper">
        <div class="topBannerBg">
            <img src="{{ asset('storage/'.$info->tv_cover) }}" alt="{{ $info->tv_name }}">
        </div>
        <div class="mainTopBg"></div>

        <div class="mainMiddleBg">
            <div class="main">
                <div class="row clearfix">
                    <!-- 海报 -->
                    <div class="posterPlaceholder">
                        <div class="posterCon">
                            <div class="pic">
                                <img alt="{{ $info->tv_name }}" onerror="javascript:this.src='{{ asset('pc/images/v_defaultPic.png') }}'" src="{{ asset('storage/'.$info->tv_cover) }}">
                            </div>
                            <i class="iPosterArrow"></i>
                            <p class="pFun clearfix">
                                <a target="_self" href="javascript:void(0);" id="addCollect" rel="nofollow" class="aCollect">
                                    <i class="fa fa-star-o"></i> 加入收藏
                                </a>
                                <i class="iLine"></i>
                                <a href="" target="_blank" class="aComment" rel="nofollow"><i class="fa fa-exclamation-circle"></i> 不能播放点我</a>
                            </p>
                        </div>
                    </div>

                    <!-- 海报 -->

                    <!-- 介绍 -->
                    <div class="txtIntroCon">
                        <div class="tit">
                            <h1>{{ $info->tv_name }}</h1>
                            {{--<p class="pTxt"><em class="emScore">8.5分</em></p>--}}
                        </div>
                        <div class="wholeTxt">
                            <ul class="txtList clearfix">
                                <li>
                                    <em class="emTit">主演：</em>
                                    @forelse($info->tv_actors->actors as $actor)
                                        <a title="{{ $actor }}电影" href="javascript:void(0)">{{ $actor }}</a>
                                    @empty
                                        <a href="javascript:void(0)">暂无添加</a>
                                    @endforelse
                                </li>

                                <li class="li_4">
                                    <em class="emTit">导演：</em>
                                    <a title="{{ $info->tv_director }}电影" href="javascript:void(0)">{{ $info->tv_director == '' ? '暂无添加' : $info->tv_director }}</a>
                                </li>

                                <li class="li_4">
                                    <em class="emTit">类型：</em>
                                    @forelse($info->classifys as $class)
                                        <a href="javascript:void(0)">{{ $class->classify_name }}</a>
                                    @empty
                                        <a href="javascript:void(0)">暂无添加</a>
                                    @endforelse
                                </li>

                                <li class="li_4">
                                    <em class="emTit">时长：</em>
                                    <em>{{ $info->tv_minute }}分钟</em>
                                </li>

                                <li class="li_4">
                                    <em class="emTit">年代：</em>
                                    <em>{{ $info->tv_show_year }}</em>
                                </li>

                                <li class="li_4">
                                    <em class="emTit">地区：</em>
                                    <a title="{{ $info->tv_area }}电影" href="javascript:void(0)">{{ $info->tv_area }}</a>
                                </li>

                                <li class="li_4">
                                    @if($info->tv_alias_name !== '')
                                    <em class="emTit">别名：</em>
                                    <em>{{ $info->tv_alias_name }}</em>
                                    @endif
                                </li>

                                <li class="extend">
                                    <em class="emTit">简介：</em>
                                    <p class="pIntro pIntroMovie">
                                        {{ $info->tv_description }}
                                    </p>
                                </li>
                            </ul>

                            <!-- 播放 -->
                            <div class="playBtnCon latestPlayCon clearfix">
                                <a href="javascript:void(0)" class="v_blue_btn latestBtn" id="aPlayBtn"><i class="fa fa-play"></i> 在线播放</a>
                                <a href="javascript:void(0)" class="v_yellow_btn latestBtn" id="aPlayBtn"><i class="fa fa-cloud-download"></i> 资源下载</a>
                            </div>
                            <!-- 播放 -->
                        </div>
                    </div>

                    <!-- 介绍 -->

                    <!-- 功能 -->
                    <a href="javascript:void(0)" class="aQRCodeBtn">
                        <span class="btn"><i class="iconfont">&#xe649;</i>sssssssimc</span>
                    </a>
                    <!-- 功能 -->
                </div>

                <div class="row mt20 clearfix">
                    <!-- 左栏内容 -->
                    <div class="col_a">
                        <!-- 资源中心 -->
                        <div class="resource">
                            <ul class="tab">
                                <li class="tabLi tabLi1 cur">百度网盘</li>
                                <li class="tabLi tabLi2">在线播放</li>
                                <li class="tabLi tabLi3">下载中心</li>
                            </ul>
                            <div class="tabContent tabContent1 on">11</div>
                            <div class="tabContent tabContent2">22</div>
                            <div class="tabContent tabContent3">33</div>
                        </div>

                        <!--热门电影 begin -->
                        <div class="v_mod">
                            <div class="v_th"><span class="sMark">相关影视推荐</span></div>

                            <div class="v_tb">
                                <div class="v_picConBox height568">
                                    <ul class="v_picTxt pic167_223 clearfix">
                                        <li>
                                            <div class="pic">
                                                <img width="133" height="185" src="asdf.jpg" onerror="javascript:this.src='{{ asset('pc/images/v_defaultPic.png') }}'" />
                                                {{--<p class="pRightBottom"><em>8.8分</em></p>--}}
                                                <a class="aPlayBtn" href="javascript:void(0)"><i></i></a>
                                            </div>
                                            <div class="txt">
                                                <span class="sTit"><a href="javascript:void(0)">记忆大师</a></span>
                                                <span class="sActor"><em>黄渤</em>&nbsp;&nbsp;<em>徐静蕾</em>&nbsp;&nbsp;<em>段奕宏</em>&nbsp;&nbsp;<em>杨子姗</em>&nbsp;&nbsp;<em>许玮甯</em>&nbsp;&nbsp;<em>王真儿</em>&nbsp;&nbsp;</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- 热门电影 end -->

                        <!-- 评论 begin -->
                        <!-- 评论 end -->
                    </div>
                    <!-- 左栏内容 -->

                    <!-- 右栏内容 -->
                    <div class="col_b">
                        <!-- 本周热播榜 start -->
                        <div class="v_mod">
                            <div class="v_th_s">
                                <span class="sMark">本周热播榜</span>
                                <a class="aMore_left" href="http://dianying.2345.com/top/" rel="nofollow">更多></a>
                            </div>

                            <div class="v_tb">
                                <ul class="v_rank clearfix">
                                    <li><i class="iNum iCurNum">1</i><span class="sScore">8.3分</span><a <a
                                                href="http://dianying.2345.com/detail/191315.html" target="_blank"
                                                title="有完没完电影" data-ajax83="ys_dy_2015_detail_rb_1">有完没完</a></li>

                                    <li><i class="iNum iCurNum">2</i><span class="sScore">8.1分</span><a <a
                                                href="http://dianying.2345.com/detail/174392.html" target="_blank"
                                                title="金刚骷髅岛电影" data-ajax83="ys_dy_2015_detail_rb_2">金刚：骷髅岛</a></li>

                                    <li><i class="iNum iCurNum">3</i><span class="sScore">8.6分</span><a <a
                                                href="http://dianying.2345.com/detail/182866.html" target="_blank"
                                                title="非凡任务电影" data-ajax83="ys_dy_2015_detail_rb_3">非凡任务</a></li>

                                    <li><i class="iNum ">4</i><span class="sScore">8.5分</span><a <a
                                                href="http://dianying.2345.com/detail/165794.html" target="_blank"
                                                title="我不是潘金莲电影" data-ajax83="ys_dy_2015_detail_rb_4">我不是潘金莲</a></li>

                                    <li><i class="iNum ">5</i><span class="sScore">8.8分</span><a <a
                                                href="http://dianying.2345.com/detail/179333.html" target="_blank"
                                                title="超凡战队电影" data-ajax83="ys_dy_2015_detail_rb_5">超凡战队</a></li>

                                    <li><i class="iNum ">6</i><span class="sScore">8.6分</span><a <a
                                                href="http://dianying.2345.com/detail/192192.html" target="_blank"
                                                title="摔跤吧爸爸电影" data-ajax83="ys_dy_2015_detail_rb_6">摔跤吧！爸爸</a></li>

                                    <li><i class="iNum ">7</i><span class="sScore">8.9分</span><a <a
                                                href="http://dianying.2345.com/detail/191521.html" target="_blank"
                                                title="六人晚餐电影" data-ajax83="ys_dy_2015_detail_rb_7">六人晚餐</a></li>

                                    <li><i class="iNum ">8</i><span class="sScore">8.7分</span><a <a
                                                href="http://dianying.2345.com/detail/190295.html" target="_blank"
                                                title="绑架者电影" data-ajax83="ys_dy_2015_detail_rb_8">绑架者</a></li>

                                    <li><i class="iNum ">9</i><span class="sScore">8.6分</span><a <a
                                                href="http://dianying.2345.com/detail/189361.html" target="_blank"
                                                title="仙球大战电影" data-ajax83="ys_dy_2015_detail_rb_9">仙球大战</a></li>

                                    <li><i class="iNum ">10</i><span class="sScore">8.3分</span><a <a
                                                href="http://dianying.2345.com/detail/192645.html" target="_blank"
                                                title="临时演员电影" data-ajax83="ys_dy_2015_detail_rb_10">临时演员</a></li>

                                </ul>
                            </div>
                        </div>
                        <!-- 本周热播榜 end -->
                    </div>
                    <!-- 右栏内容 -->
                </div>
            </div>
        </div>
        <div class="mainBottomBg"></div>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function(){
            $(".tab .tabLi").click(function(){
                $(".tab .tabLi").eq($(this).index()).addClass("cur").siblings().removeClass('cur');
                $('.tabContent').removeClass('on');
                $(".tabContent").hide().eq($(this).index()).show().addClass('on');
            });
        });
    </script>
@endsection