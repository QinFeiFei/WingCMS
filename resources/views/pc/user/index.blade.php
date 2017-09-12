@extends('pc.layouts.user')
@section('title', '用户中心')
@section('head')
    <link href="{{ asset('pc/css') }}/global_v4.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/userindex.css">
    <style>
        .pic180_240 li, .pic180_100 li {margin-right: 15px !important;}
        .pfooter {font-size:12px;}
        body {background:#fff;}
    </style>
@endsection

@section('content')
    @include('pc.user._nav', ['navpos'=>'one'])

    <div class="main clearfix">
    <!--主题头部 begin-->
    <div class="maintop clearfix">
        <!--左侧用户信息 start-->
        <div class="userInfo indexBox">
            <!-- <div class="ie_filter"></div> -->
            <div class="info">
                <a class="head" id="headEdit" href="{{ route('pc::userEditAvatar') }}">
                    <img src="{{ userAvatar($user) }}" />
                </a>
                <div class="right">
                    <em class="name">{{ $user->username }}</em>

                    <em>上次登陆：{{ $user->last_login }}</em>
                    <a href="{{ route('pc::userEditInfo') }}" class="index_btn btn_white">修改资料</a>
                    {{--<a href="javascript:;" class="index_btn btn_white">登录详情</a>--}}
                </div>


                <div class="acc_icon">
                    <span>账号安全：</span>
                    <a class="user_icon {{ empty($user->phone) ? 'bac_gray' : '' }} icon_phone" href="{{ route('pc::userBindPhone') }}">
                        <i></i>
                        <em class="tips"><i class="top"></i>绑定手机</em>
                    </a>
                    <a class="user_icon {{ empty($user->email) ? 'bac_gray' : '' }} icon_email" href="{{ route('pc::userBindEmail') }}">
                        <i></i>
                        <em class="tips"><i class="top"></i>绑定邮箱</em>
                    </a>
                    <a class="user_icon bac_gray icon_weixin" href="javascript:void(alert('暂未开发'))">
                        <i></i>
                        <em class="tips"><i class="top"></i>绑定微信</em>
                    </a>
                    <a class="user_icon bac_gray icon_qq" href="javascript:void(alert('暂未开发'))">
                        <i></i>
                        <em class="tips"><i class="top"></i>绑定QQ</em>
                    </a>
                    <a class="user_icon icon_pwd" href="">
                        <i></i>
                        <em class="tips"><i class="top"></i>修改密码</em>
                    </a>

                </div>
            </div>

            <div class="resource">
                <div class="title">
                    <p>公众帐号</p>
                    <span class="right"> 欢迎关注微信公众帐号</span>
                </div>

                <img src="{{ asset('/pc/user') }}/resource.jpg">
            </div>
        </div>
        <!--左侧用户信息 end-->

        <!--右侧 小游戏 start-->
        <div class="extension indexBox">
            <div class="title">
                <p>消息中心</p>
                <a class="download" href=""></a>
            </div>

            <div class="exList">
                <ul class="game-list">
                    <p style="line-height:180px;text-align:center;font-size:14px;">- - ||| 暂未开发</p>
                    <!--
                    <li>
                        <a href="" target="_blank">
                            <img src="{{ asset('/pc/user') }}/.jpg" style="width:52px; height:52px;">
                            <span></span>
                        </a>
                    </li>
                    -->
                </ul>
            </div>
        </div>
    </div>

    <!--广告位 -->

    <!-- 常用查询 start -->
    <div class="groupSearch indexBox">
        <div class="title">
            <p>浏览记录</p>
            <a class="more" href="{{ route('pc::watchList') }}">所有浏览记录&nbsp;&gt;</a>
        </div>
        <div class="searchBox">
            <ul class="v_picTxt pic180_240 pic180_210 clearfix">
            @forelse($watchs as $info)
                <li>
                    <div class="pic">
                        <img src="{{ asset('storage/'.$info->tv->tv_cover) }}" onerror="javascript:this.src='{{ asset('pc/images/v_defaultPic.png') }}';" />
                        <a class="aPlayBtn" href="{{ route('pc::tvDetail', ['type'=>'teleplay', 'tv_id'=>idEncode($info->tv_id)]) }}"><i></i></a>
                    </div>
                    <div class="txtPadding">
                    <span class="sTit">
                        {{--<em class="emScore">8.4</em>--}}
                        <em class="emTit"><a href="{{ route('pc::tvDetail', ['type'=>'teleplay', 'tv_id'=>idEncode($info->tv_id)]) }}">{{ $info->tv->tv_name }}</a></em>
                    </span>
                        <span class="sDes">{{ $info->tv->tv_brief }}</span>
                    </div>
                    <span class="remove" data-id="{{ $info->watch_id }}"></span>
                </li>
            @empty
                <p style="">暂无观看记录 - -</p>
            @endforelse
            </ul>
        </div>

    </div>
    <!-- 常用查询 end -->


    <!--底部 游戏中心 start-->
    {{--
    <div class="mainbot indexBox">
        <div class="title">
            <p>游戏中心</p>
            <div class="tab">
                <a class="pc active" href="javascript:;">最新游戏</a>
                <a class="phone" href="javascript:;">免费礼包</a>
            </div>
            <a class="more" href="" target="_blank">
                <span class="text">更多好玩，等你来玩&nbsp;&gt; </span>
                <i class="fire"></i>
            </a>
        </div>
        <div class="gameList">

            <div class="game gameBlock">
                <div class="fLeft">
                                        <a class="" href="http://g.wan.2345.com/s/1/1254/1488.html?frm=yhzx-zctp1" target="_blank" onclick="cc(&#39;H36&#39;)">
                        <img src="{{ asset('/pc/user') }}/newGameLeft-1.jpg"></a>
                                        <a class="" href="http://g.wan.2345.com/s/1/1254/1487.html?frm=yhzx-zctp2" target="_blank" onclick="cc(&#39;H37&#39;)">
                        <img src="{{ asset('/pc/user') }}/newGameLeft-2.jpg"></a>
                                        <a class="last" href="http://g.wan.2345.com/s/1/1254/1486.html?frm=yhzx-zctp3" target="_blank" onclick="cc(&#39;H38&#39;)">
                        <img src="{{ asset('/pc/user') }}/newGameLeft-3.jpg"></a>
                                    </div>
                                <a class="fRight" href="http://g.wan.2345.com/s/1/1254/1489.html?frm=yhzx-ycdt" target="_blank" onclick="cc(&#39;H38_1&#39;)"> <img src="{{ asset('/pc/user') }}/newGameRight.gif" alt=""> </a>
                            </div>


            <div class="game freeGift">
                <ul>
                                        <li><a href="javascript:void(0)" data-url="http://wan.2345.com/cq/kf.html?f=passport" data-game-id="1003" data-game-name="传奇霸业" onclick="cc(&#39;H39&#39;)"><img src="{{ asset('/pc/user') }}/package-cq.jpg">
                        <p><em>传奇霸业</em><span class="btn_blue">立即领取</span></p></a></li>
                                        <li><a href="javascript:void(0)" data-url="http://wan.2345.com/lycq/kf.html?f=passport" data-game-id="1025" data-game-name="蓝月传奇" onclick="cc(&#39;H40&#39;)"><img src="{{ asset('/pc/user') }}/package-lycq.jpg">
                        <p><em>蓝月传奇</em><span class="btn_blue">立即领取</span></p></a></li>
                                        <li><a href="javascript:void(0)" data-url="http://wan.2345.com/lhfs/kf.html?f=passport" data-game-id="1041" data-game-name="烈火封神" onclick="cc(&#39;H41&#39;)"><img src="{{ asset('/pc/user') }}/package-lhfs.jpg">
                        <p><em>烈火封神</em><span class="btn_blue">立即领取</span></p></a></li>
                                        <li><a href="javascript:void(0)" data-url="http://wan.2345.com/sxj/kf.html?f=passport" data-game-id="1037" data-game-name="神仙劫" onclick="cc(&#39;H42&#39;)"><img src="{{ asset('/pc/user') }}/package-sxj.jpg">
                        <p><em>神仙劫</em><span class="btn_blue">立即领取</span></p></a></li>
                                    </ul>
            </div>
        </div>
    </div>
    --}}
    <!--底部 游戏中心 end-->


    <!--底部 影视大全 start-->
    {{--
    <div class="main_video mainbot indexBox">
        <div class="title">
            <p>影视大全</p>
            <div class="tab">
                <a class="pc active" href="javascript:;" onclick="cc(&#39;H43&#39;)">热门新剧</a>
            </div>
            <a class="more" href="http://kan.2345.com/?f=passport" target="_blank" onclick="cc(&#39;H44&#39;)">海量新剧，天天看不完&nbsp;&gt;</a>
        </div>
        <div class="search" id="search">
            <a class="btn active" href="javascript:;" data-channel="tv" data-channel-index="1" onclick="cc(&#39;H46&#39;)">电视剧</a>
            <a class="btn" href="javascript:;" data-channel="movie" data-channel-index="0" onclick="cc(&#39;H45&#39;)">电影</a>
            <a class="btn" href="javascript:;" data-channel="comic" data-channel-index="2" onclick="cc(&#39;H47&#39;)">动漫</a>
            <a class="btn" href="javascript:;" data-channel="variety" data-channel-index="3" onclick="cc(&#39;H48&#39;)">综艺</a>
            <a id="refresh" class="refresh" href="javascript:;" onclick="cc(&#39;H49&#39;)"><span>换一换</span><i></i></a>
        </div>
        <div class="search_list">

            <ul class="active">
                                                <li>
                    <div class="top">
                        <img src="{{ asset('/pc/user') }}/sup53101.jpg" width="150" height="200" alt="">
                        <a href="http://tv.2345.com/detail/53101.html?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H50&#39;)"><i></i></a>
                    </div>
                    <a href="http://tv.2345.com/detail/53101.html?f=passport" target="_blank" onclick="cc(&#39;H50&#39;)"><p>
                        <em>浪花一朵朵</em>
                        <span class="grade">8.9</span>
                        <span class="lable">谭松韵熊梓淇追爱逐梦</span>
                        <span class="clear"></span>
                    </p></a>
                </li>
                                                                <li>
                    <div class="top">
                        <img src="{{ asset('/pc/user') }}/sup52534.jpg" width="150" height="200" alt="">
                        <a href="http://tv.2345.com/detail/52534.html?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H51&#39;)"><i></i></a>
                    </div>
                    <a href="http://tv.2345.com/detail/52534.html?f=passport" target="_blank" onclick="cc(&#39;H51&#39;)"><p>
                        <em>我们的少年时代 </em>
                        <span class="grade">8.8</span>
                        <span class="lable">TFboys化身热血棒球手</span>
                        <span class="clear"></span>
                    </p></a>
                </li>
                                                                <li>
                    <div class="top">
                        <img src="{{ asset('/pc/user') }}/sup53280.jpg" width="150" height="200" alt="">
                        <a href="http://tv.2345.com/detail/53280.html?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H52&#39;)"><i></i></a>
                    </div>
                    <a href="http://tv.2345.com/detail/53280.html?f=passport" target="_blank" onclick="cc(&#39;H52&#39;)"><p>
                        <em>河神</em>
                        <span class="grade">8.7</span>
                        <span class="lable">津门天团集结水下探奇案</span>
                        <span class="clear"></span>
                    </p></a>
                </li>
                                                                                                                                                                                                                                                                            </ul>

            <ul>
                                                <li>
                    <div class="top">
                        <img class="lazy" data-original="http://imgwx2.2345.com/dypcimg/img/2/48/sup146828.jpg?1501636750" width="150" height="200" alt="">
                        <a href="http://dianying.2345.com/detail/146828.html?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H53&#39;)"><i></i></a>
                    </div>
                    <a href="http://dianying.2345.com/detail/146828.html?f=passport" target="_blank" onclick="cc(&#39;H53&#39;)"><p>
                        <em>速度与激情8</em>
                        <span class="grade">8.9</span>
                        <span class="lable">速激家族全员回归</span>
                    </p></a>
                </li>
                                                                <li>
                    <div class="top">
                        <img class="lazy" data-original="http://imgwx4.2345.com/dypcimg/img/8/64/sup192439.jpg?1500539159" width="150" height="200" alt="">
                        <a href="http://dianying.2345.com/detail/192439.html?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H54&#39;)"><i></i></a>
                    </div>
                    <a href="http://dianying.2345.com/detail/192439.html?f=passport" target="_blank" onclick="cc(&#39;H54&#39;)"><p>
                        <em>当怪物来敲门</em>
                        <span class="grade">8.8</span>
                        <span class="lable">连姆·尼森版《潘神的迷宫》</span>
                    </p></a>
                </li>
                                                                <li>
                    <div class="top">
                        <img class="lazy" data-original="http://imgwx1.2345.com/dypcimg/img/9/55/sup165794.jpg?1479453031" width="150" height="200" alt="">
                        <a href="http://dianying.2345.com/detail/165794.html?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H55&#39;)"><i></i></a>
                    </div>
                    <a href="http://dianying.2345.com/detail/165794.html?f=passport" target="_blank" onclick="cc(&#39;H55&#39;)"><p>
                        <em>我不是潘金莲</em>
                        <span class="grade">8.7</span>
                        <span class="lable">范爷变村姑死磕老干部</span>
                    </p></a>
                </li>
                                                                                                                                                                                                                                                                            </ul>

            <ul>
                                                <li>
                    <div class="top">
                        <img class="lazy" data-original="http://imgwx2.2345.com/dypcimg/dongman/img/6/23/sup69380.jpg" width="150" height="200" alt="">
                        <a href="http://dongman.2345.com/dm/69380.html?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H56&#39;)"><i></i></a>
                    </div>
                    <a href="http://dongman.2345.com/dm/69380.html?f=passport" target="_blank" onclick="cc(&#39;H56&#39;)"><p>
                        <em>粉红小猪佩奇</em>
                        <span class="grade">8.9</span>
                        <span class="lable">粉红小猪的幸福生活</span>
                        <span class="clear"></span>
                    </p></a>
                </li>
                                                                <li>
                    <div class="top">
                        <img class="lazy" data-original="http://imgwx1.2345.com/dypcimg/dongman/img/2/27/sup81508.jpg" width="150" height="200" alt="">
                        <a href="http://dongman.2345.com/dm/81508.html?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H57&#39;)"><i></i></a>
                    </div>
                    <a href="http://dongman.2345.com/dm/81508.html?f=passport" target="_blank" onclick="cc(&#39;H57&#39;)"><p>
                        <em>多吉救援小先锋</em>
                        <span class="grade">8.8</span>
                        <span class="lable">趣味学习安全知识</span>
                        <span class="clear"></span>
                    </p></a>
                </li>
                                                                <li>
                    <div class="top">
                        <img class="lazy" data-original="http://imgwx4.2345.com/dypcimg/dongman/img/9/26/sup80569.jpg" width="150" height="200" alt="">
                        <a href="http://dongman.2345.com/dm/80569.html?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H58&#39;)"><i></i></a>
                    </div>
                    <a href="http://dongman.2345.com/dm/80569.html?f=passport" target="_blank" onclick="cc(&#39;H58&#39;)"><p>
                        <em>海上丝路南珠宝宝</em>
                        <span class="grade">8.7</span>
                        <span class="lable">聪明宝宝人工降雨解救危机</span>
                        <span class="clear"></span>
                    </p></a>
                </li>
                                                                                                                                                                                                                                                                            </ul>

            <ul>
                                                <li>
                    <div class="top">
                        <img class="lazy" data-original="http://imgwx2.2345.com/dypcimg/zongyi/img/6/12/sup36003.jpg" width="150" height="200" alt="">
                        <a href="http://kan.2345.com/zongyi/zy_36003/?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H59&#39;)"><i></i></a>
                    </div>
                    <a href="http://kan.2345.com/zongyi/zy_36003/?f=passport" target="_blank" onclick="cc(&#39;H59&#39;)"><p>
                        <em>我们来了 第2季</em>
                        <span class="grade">8.9</span>
                        <span class="lable">第3期：陈妍希展现跳远绝技</span>
                        <span class="clear"></span>
                    </p></a>
                </li>
                                                                <li>
                    <div class="top">
                        <img class="lazy" data-original="http://imgwx1.2345.com/dypcimg/zongyi/img/b/11/sup35504.jpg?1497247596" width="150" height="200" alt="">
                        <a href="http://kan.2345.com/zongyi/zy_35504/?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H60&#39;)"><i></i></a>
                    </div>
                    <a href="http://kan.2345.com/zongyi/zy_35504/?f=passport" target="_blank" onclick="cc(&#39;H60&#39;)"><p>
                        <em>明日之子</em>
                        <span class="grade">8.8</span>
                        <span class="lable">第10期：杨幂即兴画画表白荷兹</span>
                        <span class="clear"></span>
                    </p></a>
                </li>
                                                                <li>
                    <div class="top">
                        <img class="lazy" data-original="http://imgwx1.2345.com/dypcimg/zongyi/img/6/11/sup35750.jpg" width="150" height="200" alt="">
                        <a href="http://kan.2345.com/zongyi/zy_35750/?f=passport" class="aPlayBtn" target="_blank" onclick="cc(&#39;H61&#39;)"><i></i></a>
                    </div>
                    <a href="http://kan.2345.com/zongyi/zy_35750/?f=passport" target="_blank" onclick="cc(&#39;H61&#39;)"><p>
                        <em>极限挑战 第3季</em>
                        <span class="grade">8.7</span>
                        <span class="lable">孙红雷林志玲沙滩尬舞</span>
                        <span class="clear"></span>
                    </p></a>
                </li>
                                                                                                                                                                                                                                                                            </ul>
        </div>
    </div>
    --}}
    <!--底部 影视大全 end-->

</div>
@endsection