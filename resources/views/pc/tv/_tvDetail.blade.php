@extends('pc.layouts.home')

@section('head')
    <link rel="stylesheet" href="{{ asset('pc/css') }}/detail_v4.css">
    <style>
        .tabContent { margin:0;height:auto;border:1px solid #ccc;display:none;padding:15px; }
        .tab { margin:0;padding:0;list-style:none;overflow:hidden; }
        .tab li { float:left;width:100px;height:50px;text-align:center;line-height:50px;cursor:pointer; background: #e2e2e2;}
        .on { display:block; }

        .tabContent ul li {border-bottom:1px dashed #999;height:40px;line-height:40px;padding:0px 10px}
        .tabContent ul li:hover { background:#eee; }

        .tabContent ul li span {display:block;float:left;}
        .w_50 { width:50%;}
        .w_30 { width:30%;}
        .w_20 { width:20%;text-align:right;}

        .tab .cur { color:#fff;font-weight:bold;}
        .tab .tabLi1.cur { background:#1dbe6f; }
        .tab .tabLi2.cur { background:#34a9ff; }
        .tab .tabLi3.cur { background:black; }
        .resource .tabContent1.on { border-color:#1dbe6f }
        .resource .tabContent2.on { border-color:#34a9ff }
        .resource .tabContent3.on { border-color:black; }

        .lookBDPWD {padding:3px 5px;background:#444;color:#fff;}
        .lookBDPWD:hover {background:#333;color:#fff;}

        .body_1280 .height568 .pic167_223 { width: 920px !important; }
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
                                    <a title="{{ parseTvArea($info->tv_area) }}电影" href="javascript:void(0)">{{ parseTvArea($info->tv_area) }}</a>
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
                        <span class="btn">找不到想看的资源，点我</span>
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
                            <div class="tabContent tabContent1 on">
                                <ul>
                                    <li>
                                        <span class="w_50">分享链接：<a target="_blank" href="{{ $info->tv_baidu_url }}">{{ $info->tv_baidu_url }}</a></span>
                                        <span class="w_30">分享密码：<i class="BDPWD">****</i></span>
                                        <span class="w_20"><a href="javascript:void(0)" class="lookBDPWD">查看分享密码</a></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="tabContent tabContent2">
                                <img src="{{ asset('pc/images/fendou.jpg') }}" style="float:left;margin-left:35%;margin-right:50px;">
                                <p style="font-size:20px;line-height:30px;margin-top:7px;">我们正在努力开发该功能 ...</p>
                                <p style="font-size:20px;line-height:30px;">亲一定要多多关注我们哦 ~</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="tabContent tabContent3">
                                <img src="{{ asset('pc/images/fendou.jpg') }}" style="float:left;margin-left:35%;margin-right:50px;">
                                <p style="font-size:20px;line-height:30px;margin-top:7px;">我们正在努力开发该功能 ...</p>
                                <p style="font-size:20px;line-height:30px;">亲一定要多多关注我们哦 ~</p>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <!--热门电影 begin -->
                        <div class="v_mod">
                            <div class="v_th mt20"><span class="sMark">相关影视推荐</span></div>

                            <div class="v_tb">
                                <div class="v_picConBox height568">
                                    <ul class="v_picTxt pic167_223 clearfix">
                                        @forelse($relates as $relate)
                                        <li>
                                            <div class="pic">
                                                <img width="133" height="185" src="{{ asset('storage/'.$relate->tv_cover) }}" onerror="javascript:this.src='{{ asset('pc/images/v_defaultPic.png') }}'" />
                                                {{--<p class="pRightBottom"><em>8.8分</em></p>--}}
                                                <a class="aPlayBtn" href="javascript:void(0)"><i></i></a>
                                            </div>
                                            <div class="txt">
                                                <span class="sTit"><a href="{{ route('pc::movieDetail', ['tv_id'=>$relate->tv_id]) }}">{{ $relate->tv_name }}</a></span>
                                                <span class="sActor">
                                                    @forelse($relate->tv_actors->actors as $actor2)
                                                        <em>{{ $actor2 }}</em>&nbsp;&nbsp;
                                                    @empty
                                                    @endforelse
                                                </span>
                                            </div>
                                        </li>
                                        @empty
                                        @endforelse
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
                                <span class="sMark">本周推荐</span>
                                {{--<a class="aMore_left" href="" rel="nofollow">更多></a>--}}
                            </div>

                            <div class="v_tb">
                                <ul class="v_rank clearfix">
                                    @forelse($pushs as $k=>$push)
                                    <li>
                                        <i class="iNum iCurNum">{{ $k+1 }}</i>
                                        <span class="sScore">{{ $push->tv_grade }}分</span>
                                        <a href="{{ route('pc::movieDetail', ['tv_id'=>idEncode($push->tv_id)]) }}" target="_blank">{{ $push->tv_name }}</a>
                                    </li>
                                    @empty
                                        <li>暂无推荐</li>
                                    @endforelse
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

            var bdpwd = '{{ $info->tv_baidu_pwd }}';
            $(".lookBDPWD").click(function(){
                $(".BDPWD").text(bdpwd);
            })
        });
    </script>
@endsection