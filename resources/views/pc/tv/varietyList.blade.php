@extends('pc.tv._tvList')

@section('list_left')
    @include('pc.tv._tvListLeft', ['type' => 'variety'])
@endsection

@section('list_list')
    <div class="col_c">
        <!-- 筛选 -->
        <ul class="selectList clearfix">
            <li>
                <span class="sTit">类型：</span>
                <p class="pSelect"><span><a href="http://dianying.2345.com/list/------.html" class="cur"
                                            rel="nofollow" target="_self"
                                            data-ajax83="ys_list_dy_lx_0">全部</a></span><span><a
                                href="http://dianying.2345.com/list/aiqing------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_1">爱情</a></span><span><a
                                href="http://dianying.2345.com/list/dongzuo------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_2">动作</a></span><span><a
                                href="http://dianying.2345.com/list/xiju------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_3">喜剧</a></span><span><a
                                href="http://dianying.2345.com/list/zhanzheng------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_4">战争</a></span><span><a
                                href="http://dianying.2345.com/list/kehuan------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_5">科幻</a></span><span><a
                                href="http://dianying.2345.com/list/juqing------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_6">剧情</a></span><span><a
                                href="http://dianying.2345.com/list/wuxia------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_7">武侠</a></span><span><a
                                href="http://dianying.2345.com/list/maoxian------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_8">冒险</a></span><span><a
                                href="http://dianying.2345.com/list/qiangzhan------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_9">枪战</a></span><span><a
                                href="http://dianying.2345.com/list/kongbu------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_10">恐怖</a></span><span><a
                                href="http://dianying.2345.com/list/xuanyi------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_11">悬疑</a></span><span><a
                                href="http://dianying.2345.com/list/fanzui------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_12">犯罪</a></span><span><a
                                href="http://dianying.2345.com/list/qihuan------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_13">奇幻</a></span><span><a
                                href="http://dianying.2345.com/list/donghua------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_14">动画</a></span><span><a
                                href="http://dianying.2345.com/list/jingsong------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_15">惊悚</a></span><span><a
                                href="http://dianying.2345.com/list/jingdian------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_16">经典</a></span><span><a
                                href="http://dianying.2345.com/list/qingchun------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_17">青春</a></span><span><a
                                href="http://dianying.2345.com/list/wenyi------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_18">文艺</a></span><span><a
                                href="http://dianying.2345.com/list/weidianying------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_19">微电影</a></span><span><a
                                href="http://dianying.2345.com/list/guzhuang------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_20">古装</a></span><span><a
                                href="http://dianying.2345.com/list/lishi------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_21">历史</a></span><span><a
                                href="http://dianying.2345.com/list/yundong------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_22">运动</a></span><span><a
                                href="http://dianying.2345.com/list/nongcun------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_23">农村</a></span><span><a
                                href="http://dianying.2345.com/list/ertong------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_24">儿童</a></span><span><a
                                href="http://dianying.2345.com/list/wangluodianying------.html" target="_self"
                                data-ajax83="ys_list_dy_lx_25">网络电影</a></span><span><a
                                href="http://dianying.2345.com/list/qita------.html" rel="nofollow"
                                target="_self" data-ajax83="ys_list_dy_lx_26">其它</a></span></p>

            </li>

            <li>

                <span class="sTit">地区：</span>

                <p class="pSelect"><span><a target="_self" href="http://dianying.2345.com/list/------.html"
                                            class="cur" rel="nofollow"
                                            data-ajax83="ys_list_dy_dq_0">全部</a></span><span><a
                                href="http://dianying.2345.com/list/-neidi-----.html" target="_self"
                                rel="nofollow" data-ajax83="ys_list_dy_dq_1">内地</a></span><span><a
                                href="http://dianying.2345.com/list/-meiguo-----.html" target="_self"
                                rel="nofollow" data-ajax83="ys_list_dy_dq_2">美国</a></span><span><a
                                href="http://dianying.2345.com/list/-xianggang-----.html" target="_self"
                                rel="nofollow" data-ajax83="ys_list_dy_dq_3">香港</a></span><span><a
                                href="http://dianying.2345.com/list/-taiwan-----.html" target="_self"
                                rel="nofollow" data-ajax83="ys_list_dy_dq_4">台湾</a></span><span><a
                                href="http://dianying.2345.com/list/-hanguo-----.html" target="_self"
                                rel="nofollow" data-ajax83="ys_list_dy_dq_5">韩国</a></span><span><a
                                href="http://dianying.2345.com/list/-riben-----.html" target="_self"
                                rel="nofollow" data-ajax83="ys_list_dy_dq_6">日本</a></span><span><a
                                href="http://dianying.2345.com/list/-taiguo-----.html" target="_self"
                                rel="nofollow" data-ajax83="ys_list_dy_dq_7">泰国</a></span><span><a
                                href="http://dianying.2345.com/list/-yindu-----.html" target="_self"
                                rel="nofollow" data-ajax83="ys_list_dy_dq_8">印度</a></span><span><a
                                href="http://dianying.2345.com/list/-dongnanyadiqu-----.html" target="_self"
                                rel="nofollow" data-ajax83="ys_list_dy_dq_9">东南亚地区</a></span><span><a
                                href="http://dianying.2345.com/list/-oumeidiqu-----.html" target="_self"
                                rel="nofollow" data-ajax83="ys_list_dy_dq_10">欧美地区</a></span><span><a
                                href="http://dianying.2345.com/list/-qita-----.html" target="_self"
                                rel="nofollow" data-ajax83="ys_list_dy_dq_11">其它</a></span></p>

            </li>

            <li>

                <span class="sTit">年代：</span>

                <p class="pSelect"><span><a target="_self" href="http://dianying.2345.com/list/------.html"
                                            class="cur" rel="nofollow"
                                            data-ajax83="ys_list_dy_nd_0">全部</a></span><span><a rel="nofollow"
                                                                                                href="http://dianying.2345.com/list/----2017--.html"
                                                                                                target="_self"
                                                                                                data-ajax83="ys_list_dy_nd_1">2017</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/----2016--.html"
                                target="_self" data-ajax83="ys_list_dy_nd_2">2016</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/----2015--.html"
                                target="_self" data-ajax83="ys_list_dy_nd_3">2015</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/----2014--.html"
                                target="_self" data-ajax83="ys_list_dy_nd_4">2014</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/----2013--.html"
                                target="_self" data-ajax83="ys_list_dy_nd_5">2013</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/----2012--.html"
                                target="_self" data-ajax83="ys_list_dy_nd_6">2012</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/----2011--.html"
                                target="_self" data-ajax83="ys_list_dy_nd_7">2011</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/----20102000--.html"
                                target="_self" data-ajax83="ys_list_dy_nd_8">2010-2000</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/----19991990--.html"
                                target="_self" data-ajax83="ys_list_dy_nd_9">90年代</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/----19891980--.html"
                                target="_self" data-ajax83="ys_list_dy_nd_10">80年代</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/----19791970--.html"
                                target="_self" data-ajax83="ys_list_dy_nd_11">70年代</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/----19691800--.html"
                                target="_self" data-ajax83="ys_list_dy_nd_12">更早</a></span></p>

            </li>

            <li>

                <span class="sTit">状态：</span>

                <p class="pSelect"><span><a target="_self" href="http://dianying.2345.com/list/-------.html"
                                            class="cur" rel="nofollow"
                                            data-ajax83="ys_list_dy_zt_0">全部</a></span><span><a rel="nofollow"
                                                                                                href="http://dianying.2345.com/list/------.html?1"
                                                                                                target="_self"
                                                                                                data-ajax83="ys_list_dy_zt_1">免费片</a></span><span><a
                                rel="nofollow" href="http://dianying.2345.com/list/------.html?2" target="_self"
                                data-ajax83="ys_list_dy_zt_2">预告片</a></span><span><a rel="nofollow"
                                                                                     href="http://dianying.2345.com/list/------.html?3"
                                                                                     target="_self"
                                                                                     data-ajax83="ys_list_dy_zt_3">会员片</a></span>
                </p>

            </li>

        </ul>
        <!-- 筛选 -->

        <!-- 列表 -->
        <div class="v_mod listCon">
            <div class="v_th">
                <i class="iLine"></i>
                <p class="pTab">
                    <a target="_self" href="http://dianying.2345.com/list/------.html" id="default" class="cur">最热</a>
                    <!--<a target="_self" href="http://dianying.2345.com/list/-----hits-.html" rel="nofollow">最新</a>-->
                </p>
                <a class="aLatestNews" target="_blank" href="http://dianying.2345.com/top/">电影排行榜</a>
                <div class="pSelected"></div>
            </div>

            <div class="v_tb">
                <div class="v_picConBox mt15" id="contentList">
                    <ul class="v_picTxt pic180_240 clearfix">
                        @forelse ($list as $tv)
                            <li media="{{ idEncode($tv->tv_id) }}">
                                <div class="pic">
                                    <img src="{{ asset('storage/'.$tv->tv_cover) }}" onerror="javascript:this.src='{{ asset('pc/images/v_defaultPic.png') }}';" alt="{{ $tv->tv_name }}">
                                    {{--<span class="pRightBottom"><em>8.5分</em></span> 暂时没有评分功能 --}}

                                    <a class="aPlayBtn" href="{{ route('pc::movieDetail', ['tv_id'=>idEncode($tv->tv_id)]) }}" title="{{ $tv->tv_name }}"><i></i></a>
                                </div>

                                <div class="txtPadding">
                                                    <span class="sTit">
                                                      <em class="emTit"><a title="{{ $tv->tv_name }}" href="{{ route('pc::movieDetail', ['tv_id'=>idEncode($tv->tv_id)]) }}">{{ $tv->tv_name }}</a></em>
                                                    </span>

                                                    <span class="sDes">
                                                        主演：<em>
                                                            <a href="http://dianying.2345.com/list/---fanbingbing---.html" title='范冰冰电影'>范冰冰&nbsp;&nbsp;</a></em>&nbsp;<em>
                                                            <a href="http://dianying.2345.com/list/---guotao---.html" title='张嘉译电影'>张嘉译&nbsp;&nbsp;</a></em>
                                                    </span>
                                </div>
                            </li>
                        @empty
                            @include('pc.tv._noResult')
                        @endforelse
                    </ul>

                    <div style="text-align: center">
                        {!! $list->appends(['sort' => 'votes'])->render() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- 列表 -->
    </div>
@endsection