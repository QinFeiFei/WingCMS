@extends('pc.layouts.home')

@section('head')
    <link rel="stylesheet" href="{{ asset('pc/css') }}/detail_v4.css">
@endsection

@section('content')
    <div class="wrapper">

        <div class="topBannerBg">

            <img src="images/sup165794_223x310.jpg" alt="我不是潘金莲背景图">

        </div>

        <div class="mainTopBg"></div>

        <div class="mainMiddleBg">

            <div class="main">

                <div class="row clearfix">

                    <!-- 海报 -->

                    <div class="posterPlaceholder">

                        <div class="posterCon">

                            <div class="pic">

                                <img alt="我不是潘金莲完整版" onerror="javascript:this.src='images/v_defaultPic.png'"
                                     src="images/sup165794_223x310.jpg">

                                <a id="aPlayPic" href="http://v.qq.com/x/cover/wwx7abetdayqp93.html?ptag=2345.movie"
                                   class="aPlayBtn_show" target="_blank" title="我不是潘金莲完整版" name="playLink" data="qq_0"
                                   data-ajax83="ys_dy_2015_detail_pic" rel="nofollow"><i></i></a></div>

                            <i class="iPosterArrow"></i>

                            <p class="pFun clearfix">

                                <a target="_self" href="javascript:void(0);" media="dy_165794" id="addCollect"
                                   rel="nofollow" data-ajax83="ys_dy_2015_detail_sc" class="aCollect"><i class="iconfont"
                                                                                                         id="addCollect_i">
                                        &#xe60e;</i>加入收藏</a>

                                <i class="iLine"></i>

                                <a href="http://bbs.2345.cn/thread.php?fid=1&pid=3805547"
                                   data-ajax83="ys_fk_dy_165794_我不是潘金莲" target="_blank" class="aComment" rel="nofollow"><i
                                            class="iconfont">&#xe64b;</i>不能播放点我</a>

                            </p>

							<span class="sCollectTips" id="sCollectTips">

								<a href="javascript:void(0);" target="_self" class="aClose"><i
                                            class="iconfont">�f</i></a>

								<em>收藏功能搬到这里啦</em>

							 </span>

                        </div>

                    </div>

                    <!-- 海报 -->

                    <!-- 介绍 -->

                    <div class="txtIntroCon">

                        <div class="tit">

                            <h1>我不是潘金莲</h1>

                            <p class="pTxt"><em class="emScore">8.5分</em></p></div>

                        <div class="wholeTxt">

                            <ul class="txtList clearfix">

                                <li>

                                    <em class="emTit">主演：</em>

                                    <a data-ajax83="ys_dy_2015_detail_zhy_1" title="范冰冰电影"
                                       href="http://dianying.2345.com/list/---fanbingbing---.html" target="_blank"
                                       data-ajax83="ys_dy_2015_detail_zhuy_1">范冰冰</a>

                                    <a data-ajax83="ys_dy_2015_detail_zhy_2" title="张嘉译电影"
                                       href="http://dianying.2345.com/list/---guotao---.html" target="_blank"
                                       data-ajax83="ys_dy_2015_detail_zhuy_2">张嘉译</a>

                                    <a data-ajax83="ys_dy_2015_detail_zhy_3" title="张默电影"
                                       href="http://dianying.2345.com/list/---dapeng---.html" target="_blank"
                                       data-ajax83="ys_dy_2015_detail_zhuy_3">张默</a>

                                    <a data-ajax83="ys_dy_2015_detail_zhy_4" title="于和伟电影"
                                       href="http://dianying.2345.com/list/---zhangjiayi---.html" target="_blank"
                                       data-ajax83="ys_dy_2015_detail_zhuy_4">于和伟</a>


                                </li>

                                <li class="li_4">

                                    <em class="emTit">导演：</em>

                                    <a data-ajax83="ys_dy_2015_detail_daoy" title="冯小刚电影"
                                       href="http://dianying.2345.com/mingxing/526/" rel='nofollow' target="_blank"
                                       data-ajax83="ys_dy_2015_detail_daoy_1">冯小刚</a>

                                </li>

                                <li class="li_4">

                                    <em class="emTit">类型：</em>

                                    <a title="剧情电影" data-ajax83="ys_dy_2015_detail_leix_1" href="/list/juqing------.html"
                                       target="_blank">剧情</a>

                                    <a title="爱情电影" data-ajax83="ys_dy_2015_detail_leix_2" href="/list/aiqing------.html"
                                       target="_blank">爱情</a>

                                    <a title="家庭电影" data-ajax83="ys_dy_2015_detail_leix_3" href="/list/jiating------.html"
                                       target="_blank">家庭</a>

                                </li>

                                <li class="li_4">

                                    <em class="emTit">时长：</em>

                                    <em>138分钟</em>

                                </li>

                                <li class="li_4">

                                    <em class="emTit">年代：</em>

                                    <em>2016</em>

                                </li>

                                <li class="li_4">

                                    <em class="emTit">地区：</em>

                                    <a title="内地电影" data-ajax83="ys_dy_2015_detail_diq" href="/list/-neidi-----.html"
                                       target="_blank">内地</a>

                                </li>

                                <li class="li_4">

                                    <em class="emTit">别名：</em>

                                    <em>我是李雪莲 我叫李雪莲</em>

                                </li>

                                <li class="extend">

                                    <em class="emTit">简介：</em>

                                    <p class="pIntro pIntroMovie"><span class="sPart">剧情讲述了李雪莲的前夫骂李雪莲是“潘金莲”。为了还自己一个清白，李雪莲开始状告他。但一件事很快变成了另一件事，为了纠正一句话，李雪莲告了二十年。影片将用喜剧形式讲述“依法治国”的必要性。</span><span
                                                class="sAll">剧情讲述了李雪莲的前夫骂李雪莲是“潘金莲”。为了还自己一个清白，李雪莲开始状告他。但一件事很快变成了另一件事，为了纠正一句话，李雪莲告了二十年。影片将用喜剧形式讲述“依法治国”的必要性。</span>
                                    </p>

                                </li>

                            </ul>

                            <!-- 播放 -->

                            <div class="playBtnCon latestPlayCon clearfix">

                                <!--付费|正片-->

                                <a href="http://v.qq.com/x/cover/wwx7abetdayqp93.html?ptag=2345.movie" target="_blank"
                                   class="v_blue_btn latestBtn" id="aPlayBtn" name="playLink" data="qq_0" rel='nofollow'
                                   data-ajax83="ys_dy_2015_detail_bfy_0" data-flag="area"><i class="iconfont">&#xe605;</i>立即播放</a>
                                <div class="playSource">

                                    <span class="sTit">来源：</span>

                                    <a target="_blank" href="http://v.qq.com/x/cover/wwx7abetdayqp93.html?ptag=2345.movie"
                                       name="playLink" data="qq_0" rel='nofollow' data-ajax83="ys_dy_2015_detail_bfy_1"><img
                                                width="16" height="16" alt="我不是潘金莲下载" src="images/qq.gif"/>腾讯</a>

                                    <a target="_blank" href="http://www.iqiyi.com/v_19rra8dd40.html?vfm=2002_2345f"
                                       name="playLink" data="qiyi_0" rel='nofollow'
                                       data-ajax83="ys_dy_2015_detail_bfy_2"><img width="16" height="16" alt="我不是潘金莲下载"
                                                                                  src="images/qiyi.gif"/>爱奇艺</a>

                                    <div class="more_mod " id="sourceMore">

                                    <span class="sMore">更多<i class="iIconfont"><i class="iconfont">
                                                &#xe600;</i></i></span>

                                        <div class="more_tb " id="sourceMore">

                                            <i class="iArrow"></i>

                                            <div class="more_mod_border clearfix">

                                                <a target="_blank"
                                                   href="http://v.pptv.com/show/nSMIhib9VxQNm5Og.html?rcc_id=2345daohangcl"
                                                   name="playLink" data="pptv_0" rel='nofollow'
                                                   data-ajax83="ys_dy_2015_detail_bfy_gd_1"><img src="images/pptv.gif">PPTV</a>

                                                <a target="_blank"
                                                   href="http://v.youku.com/v_show/id_XMjQ3ODU0NzIwMA==.html?tpa=dW5pb25faWQ9MTAzNzM4XzEwMDAwMV8wMV8wMQ&from=2345shipin&refer=2345shipin"
                                                   name="playLink" data="youku_0" rel='nofollow'
                                                   data-ajax83="ys_dy_2015_detail_bfy_gd_2"><img
                                                            src="images/youku.gif">优酷</a>

                                                <a target="_blank"
                                                   href="http://www.mgtv.com/b/292031/3789569.html?cxid=94gw9uoaq"
                                                   name="playLink" data="mgtv_0" rel='nofollow'
                                                   data-ajax83="ys_dy_2015_detail_bfy_gd_3"><img
                                                            src="images/mgtv.gif">芒果</a>

                                                <i class="clear"></i>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                            </div>

                            <!-- 播放 -->

                        </div>

                    </div>

                    <!-- 介绍 -->

                    <!-- 功能 -->

                    <span style="display: none;" id="coopSource">qiyi,qq,sohu</span>

                    <a href="http://download.duote.org/2345moive_app.exe" target="_self" class="aQRCodeBtn"
                       data-ajax83="ys_2017_dedail_download3" rel="nofollow">

                        <span class="btn"><i class="iconfont">&#xe649;</i>下载桌面版极速看</span>

                    </a>

                    <!-- 功能 -->

                </div>

                <!--第1个广告 start-->

                <!--第1个广告 end-->

                <!--第2个广告 start-->

                <div class="rowIvy ivy-user-defined mt20 clearfix">

                    <div class="ivy-user-defined" style="margin-left:-15px">




                    </div>

                </div>

                <!--第2个广告 end-->

                <div class="row mt20 clearfix">

                    <!-- 左栏内容 -->

                    <div class="col_a">

                        <!-- 影院热映 begin -->

                        <!-- 影院热映 end -->

                        <!--热门电影 begin -->

                        <div class="v_mod mt5">

                            <div class="v_th"><span class="sMark">好看的剧情电影</span></div>

                            <div class="v_tb">

                                <div class="v_picConBox height568">

                                    <ul class="v_picTxt pic167_223 clearfix">

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/s168230.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>8.8分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/168230.html"
                                                                                            title="记忆大师"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_1"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/168230.html"
                                                                                   title="记忆大师"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_1">记忆大师</a></span><span
                                                        class="sActor"><em>黄渤</em>&nbsp;&nbsp;<em>徐静蕾</em>&nbsp;&nbsp;<em>段奕宏</em>&nbsp;&nbsp;<em>杨子姗</em>&nbsp;&nbsp;<em>许玮甯</em>&nbsp;&nbsp;<em>王真儿</em>&nbsp;&nbsp;</span>
                                            </div>

                                        </li>

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/s174265.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>7.3分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/174265.html"
                                                                                            title="赤裸女特工2暗夜舞者"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_2"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/174265.html"
                                                                                   title="赤裸女特工2暗夜舞者"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_2">赤裸女特工2暗夜舞者</a></span><span
                                                        class="sActor"><em>于洋</em>&nbsp;&nbsp;<em>郑德</em>&nbsp;&nbsp;<em>靳美玲</em>&nbsp;&nbsp;<em>于洪林</em>&nbsp;&nbsp;<em>张婷婷</em>&nbsp;&nbsp;<em>胡宗祥</em>&nbsp;&nbsp;<em>刘梦</em>&nbsp;&nbsp;<em>赵欣彤</em>&nbsp;&nbsp;</span>
                                            </div>

                                        </li>

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/s191232.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>9.0分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/191232.html"
                                                                                            title="傲娇与偏见"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_3"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/191232.html"
                                                                                   title="傲娇与偏见"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_3">傲娇与偏见</a></span><span
                                                        class="sActor"><em>迪丽热巴</em>&nbsp;&nbsp;<em>张云龙</em>&nbsp;&nbsp;<em>高伟光</em>&nbsp;&nbsp;<em>金晨</em>&nbsp;&nbsp;<em>马薇薇</em>&nbsp;&nbsp;<em>范����</em>&nbsp;&nbsp;<em>披拉・尼迪裴善官</em>&nbsp;&nbsp;<em>周海媚</em>&nbsp;&nbsp;<em>樊野</em>&nbsp;&nbsp;<em>李��</em>&nbsp;&nbsp;</span>
                                            </div>

                                        </li>

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/s193361.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>8.3分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/193361.html"
                                                                                            title="佣兵的战争"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_4"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/193361.html"
                                                                                   title="佣兵的战争"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_4">佣兵的战争</a></span><span
                                                        class="sActor"><em>苗韵桐</em>&nbsp;&nbsp;</span></div>

                                        </li>

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/s108097.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>8.7分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/108097.html"
                                                                                            title="推拿"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_5"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/108097.html"
                                                                                   title="推拿"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_5">推拿</a></span><span
                                                        class="sActor"><em>秦昊</em>&nbsp;&nbsp;<em>郭晓冬</em>&nbsp;&nbsp;<em>梅婷</em>&nbsp;&nbsp;<em>黄轩</em>&nbsp;&nbsp;</span>
                                            </div>

                                        </li>

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/s153275.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>8.2分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/153275.html"
                                                                                            title="铁拳（2016）"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_6"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/153275.html"
                                                                                   title="铁拳（2016）"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_6">铁拳2016</a></span><span
                                                        class="sActor"><em>杰克・吉伦哈尔</em>&nbsp;&nbsp;<em>瑞秋・麦克亚当斯</em>&nbsp;&nbsp;<em>福里斯特・惠特克</em>&nbsp;&nbsp;<em>米古尔・戈麦斯</em>&nbsp;&nbsp;<em>娜奥米・哈里斯</em>&nbsp;&nbsp;<em>50分</em>&nbsp;&nbsp;</span>
                                            </div>

                                        </li>

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/s178282.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>8.5分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/178282.html"
                                                                                            title="悟空传"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_7"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/178282.html"
                                                                                   title="悟空传"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_7">悟空传</a></span><span
                                                        class="sActor"><em>彭于晏</em>&nbsp;&nbsp;<em>倪妮</em>&nbsp;&nbsp;<em>欧豪</em>&nbsp;&nbsp;<em>余文乐</em>&nbsp;&nbsp;<em>俞飞鸿</em>&nbsp;&nbsp;<em>郑爽</em>&nbsp;&nbsp;</span>
                                            </div>

                                        </li>

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/s72719.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>7.2分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/72719.html"
                                                                                            title="僵尸世界大战"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_8"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/72719.html"
                                                                                   title="僵尸世界大战"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_8">僵尸世界大战</a></span><span
                                                        class="sActor"><em>布拉德・皮特</em>&nbsp;&nbsp;<em>米瑞・伊诺丝</em>&nbsp;&nbsp;<em>埃里克・韦斯特</em>&nbsp;&nbsp;</span>
                                            </div>

                                        </li>

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/s192086.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>8.8分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/192086.html"
                                                                                            title="吃吃的爱"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_9"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/192086.html"
                                                                                   title="吃吃的爱"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_9">吃吃的爱</a></span><span
                                                        class="sActor"><em>徐熙娣</em>&nbsp;&nbsp;<em>林志玲</em>&nbsp;&nbsp;<em>陈汉典</em>&nbsp;&nbsp;<em>贾乃亮</em>&nbsp;&nbsp;<em>李子峰</em>&nbsp;&nbsp;</span>
                                            </div>

                                        </li>

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/35407ca001de0e75a2fba4218d5b3057.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>7.3分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/1512.html"
                                                                                            title="僵尸先生2：僵尸家族"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_10"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/1512.html"
                                                                                   title="僵尸先生2：僵尸家族"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_10">僵尸先生2僵尸家族</a></span><span
                                                        class="sActor"><em>林正英</em>&nbsp;&nbsp;<em>元彪</em>&nbsp;&nbsp;<em>李赛凤</em>&nbsp;&nbsp;<em>楼南光</em>&nbsp;&nbsp;<em>钟发</em>&nbsp;&nbsp;<em>王小凤</em>&nbsp;&nbsp;<em>午马</em>&nbsp;&nbsp;<em>胡枫</em>&nbsp;&nbsp;<em>冯淬帆</em>&nbsp;&nbsp;<em>田俊</em>&nbsp;&nbsp;<em>Chau
                                                        Sang Lau</em>&nbsp;&nbsp;</span></div>

                                        </li>

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/s153281.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>8.4分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/153281.html"
                                                                                            title="长城"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_11"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/153281.html"
                                                                                   title="长城"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_11">长城</a></span><span
                                                        class="sActor"><em>马特・达蒙</em>&nbsp;&nbsp;<em>景甜</em>&nbsp;&nbsp;<em>威廉・达福</em>&nbsp;&nbsp;<em>刘德华</em>&nbsp;&nbsp;<em>佩德罗・帕斯卡</em>&nbsp;&nbsp;<em>张涵予</em>&nbsp;&nbsp;<em>鹿晗</em>&nbsp;&nbsp;<em>林更新</em>&nbsp;&nbsp;<em>彭于晏</em>&nbsp;&nbsp;<em>黄轩</em>&nbsp;&nbsp;<em>郑恺</em>&nbsp;&nbsp;<em>王俊凯</em>&nbsp;&nbsp;<em>陈学冬</em>&nbsp;&nbsp;<em>余心恬</em>&nbsp;&nbsp;<em>刘冰</em>&nbsp;&nbsp;</span>
                                            </div>

                                        </li>

                                        <li>

                                            <div class="pic">

                                                <img width="133" height="185" src="images/noimg.png"
                                                     data-src="images/s163032.jpg"
                                                     onerror="javascript:this.src='images/v_defaultPic.png';">

                                                <p class="pRightBottom"><em>7.0分</em></p><a target="_blank" class="aPlayBtn"
                                                                                            href="http://dianying.2345.com/detail/163032.html"
                                                                                            title="睡在我上铺的兄弟"
                                                                                            data-ajax83="ys_dy_2016_detail_remen_12"><i></i></a>

                                            </div>

                                            <div class="txt"><span class="sTit"><a target="_blank"
                                                                                   href="http://dianying.2345.com/detail/163032.html"
                                                                                   title="睡在我上铺的兄弟"
                                                                                   data-ajax83="ys_dy_2016_detail_remen_12">睡在我上铺的兄弟</a></span><span
                                                        class="sActor"><em>陈晓</em>&nbsp;&nbsp;<em>秦岚</em>&nbsp;&nbsp;<em>杜天皓</em>&nbsp;&nbsp;<em>刘芮麟</em>&nbsp;&nbsp;<em>李现</em>&nbsp;&nbsp;<em>王啸坤</em>&nbsp;&nbsp;<em>余心恬</em>&nbsp;&nbsp;<em>蓝盈莹</em>&nbsp;&nbsp;<em>蒋雪鸣</em>&nbsp;&nbsp;</span>
                                            </div>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                        <!-- 热门电影 end -->


                        <!-- 下线数据推荐 begin -->

                        <!-- 下线数据推荐 end -->

                        <!-- 动画电影 begin -->

                        <!-- 动画电影 end -->

                        <!--第5个广告 start-->

                        <div class="rowIvy mt15 clearfix">

                            <div class="ivyAuto">



                            </div>

                        </div>

                        <!--第5个广告 end-->

                        <!--为您推荐 start-->

                        <!--为您推荐 end-->

                        <!-- VIP电影免费试看 begin -->

                        <!-- VIP电影免费试看 end -->


                        <!-- 评论 begin -->

                        <a name="positionToComment" id="positionToComment"></a>

                        <div class="v_mod mt10">

                            <div class="v_th"><span class="sMark">《我不是潘金莲》评论</span><a class="aMore_left" target="_blank"
                                                                                      rel="nofollow"
                                                                                      href="http://dianying.2345.com/detail/165794-9.html"
                                                                                      data-ajax83="ys_dy_2015_detail_pl_all1"
                                                                                      title="我不是潘金莲影评"><em>71</em>人参与评论</a>
                            </div>

                            <div class="v_tb">

                                <div class="comment tab-plugin" startNum="2">

                                    <div class="commentForm">

                                        <div class="commentTextArea">

                                            <textarea id="commentTextarea" defaultTxt="《我不是潘金莲》怎么样？写出你的想法">《我不是潘金莲》怎么样？写出你的想法</textarea>

                                        </div>

                                        <div class="funCon">

                                            <a href="javascript:void(0);" target="_blank" class="userName left"
                                               id="commentUer" data-ajax83="ys_dy_2015_detail_pl_username"></a>

                                            <div class="rightCon">

                                                <p class="pCode"><span class="codeErrorTxt" id="errorCode"></span><input
                                                            type="text" defaultTxt="点此输入验证码" value="点此输入验证码"
                                                            id="captchaInput" class="inputTxt" style="display:none"><i
                                                            class="iconfont iIconRight">&#xe60a;</i><i
                                                            class="iconfont iIconError">&#xe609;</i><span class="sCode"
                                                                                                          style="display:none"
                                                                                                          id="captImgId"><em
                                                                class="emCodePic"><img width="70" height="30"
                                                                                       src="images/noimg.png"></em><a
                                                                class="changeBtn" href="javascript:void(0);"
                                                                data-ajax83="ys_dy_2015_detail_pl_hyz"
                                                                target="_self">换一张</a></span></p>

                                                <a href="javascript:void(0);" target="_self"
                                                   class="v_blue_btn issueCommentBtn" id="commentSubmit"
                                                   data-ajax83="ys_dy_2015_detail_pl_pub">发表评论</a><input type="hidden"
                                                                                                         id="hidden_comment"/>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="v_tab mt20 clearfix tab-plugin-tab">

                                        <a href="javascript:void(0);" target="_self" id="comment_hot">热门评论</a>

                                        <a href="javascript:void(0);" target="_self" id="comment_2345">本站评论</a>

                                        <i class="iTabLine"></i>

                                    </div>

                                    <div class="commentListBox tab-plugin-con">

                                        <div class="commentList otherCommentList con">

                                            <ul class="clearfix">

                                                <li>

                                                    <p class="pTit"><span class="sName">安徽游客</span><span class="sTime">2017-02-11</span>
                                                    </p>

                                                    <p class="pTxt">
                                                        差差劲差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差劲差差劲差劲差劲差劲差劲差劲差差劲差劲</p>

                                                </li>

                                                <li>

                                                    <p class="pTit"><span class="sName">巴啦啦小疯子</span><span class="sTime">2016-03-14</span>
                                                    </p>

                                                    <p class="pTxt">两个zhi
                                                        惊艳！范冰冰终于飙演技之作。以前觉得范冰冰一直不适合演高大全玛丽苏，她适合演的是那些白嫩白嫩的，有些妩媚而却又身不由己的女人，例如妲己潘金莲等。在这部电影里，范冰冰总算找到了适合她的角色。而冯小刚总算找到了自己黑色幽默的感觉，把这部电影人权黑色讽刺展现的淋漓尽致。推荐。</p>

                                                </li>

                                                <li>

                                                    <p class="pTit"><span class="sName">谁让你用真名</span><span class="sTime">2016-03-14</span>
                                                    </p>

                                                    <p class="pTxt">
                                                        从《我叫李雪莲》到《我不是潘金莲》，这部电影的名字的变化，体现了六爷冯小刚动用特权挑战广电总局审查制度的胆识与气魄！六爷冯小刚已经完成了从一个市民阶层代言人到肉食者的转变。</p>

                                                </li>

                                                <li>

                                                    <p class="pTit"><span class="sName">湖南游客</span><span class="sTime">2017-02-05</span>
                                                    </p>

                                                    <p class="pTxt">1，一个普通的农村妇女李雪莲法律知识不够，自己主张假离婚，真分房，又不买账。还租人杀人。有损正面教育。
                                                        2，法院办事需提高，十年申诉未解决。加强全心全意为人民服务的思想。</p>

                                                </li>

                                                <li>

                                                    <p class="pTit"><span class="sName">广东游客</span><span class="sTime">2016-11-24</span>
                                                    </p>

                                                    <p class="pTxt">
                                                        昨天到电影院看了，抛开个人对演员的喜欢与否，别人是否炒作都与我无关；但就个人感觉而言，说句良心话，电影本身真的不错，值得一看！</p>

                                                </li>

                                            </ul>

                                        </div>


                                        <div class="commentList con" id="comment_ul" style="display:none">

                                            <ul class="clearfix" id="comment_li">

                                                <li>

                                                    <p class="pTit"><span class="sName">未知游客</span><span
                                                                class="sTime">3个月前</span><span class="sNum">66楼</span></p>

                                                    <p class="pTxt">就是��李雪���多了</p>

                                                    <p class="pFun clearfix">

                                                        <a href="javascript:void(0);" rel="nofollow" target="_self"
                                                           class="aReply right" name="aReply" tid="777576" pid="0" uid="0"
                                                           data-ajax83="ys_dy_2015_detail_pl_hf">

                                                            <i class="iconfont">&#xe604;</i>回复(0)

                                                        </a>

                                                    </p>

                                                    <div class="replyBox" id="comment_777576" style="display:none">

                                                        <i class="replyConArrow"></i>

                                                    </div>

                                                </li>

                                                <li>

                                                    <p class="pTit"><span class="sName">未知游客</span><span
                                                                class="sTime">3个月前</span><span class="sNum">65楼</span></p>

                                                    <p class="pTxt">太好了</p>

                                                    <p class="pFun clearfix">

                                                        <a href="javascript:void(0);" rel="nofollow" target="_self"
                                                           class="aReply right" name="aReply" tid="777575" pid="0" uid="0"
                                                           data-ajax83="ys_dy_2015_detail_pl_hf">

                                                            <i class="iconfont">&#xe604;</i>回复(0)

                                                        </a>

                                                    </p>

                                                    <div class="replyBox" id="comment_777575" style="display:none">

                                                        <i class="replyConArrow"></i>

                                                    </div>

                                                </li>

                                                <li>

                                                    <p class="pTit"><span class="sName">贵州游客</span><span
                                                                class="sTime">4个月前</span><span class="sNum">64楼</span></p>

                                                    <p class="pTxt">写得好，其实在这个社会中像我不是潘金莲的事情太多了。值得反思。</p>

                                                    <p class="pFun clearfix">

                                                        <a href="javascript:void(0);" rel="nofollow" target="_self"
                                                           class="aReply right" name="aReply" tid="774653" pid="0" uid="0"
                                                           data-ajax83="ys_dy_2015_detail_pl_hf">

                                                            <i class="iconfont">&#xe604;</i>回复(0)

                                                        </a>

                                                    </p>

                                                    <div class="replyBox" id="comment_774653" style="display:none">

                                                        <i class="replyConArrow"></i>

                                                    </div>

                                                </li>

                                                <li>

                                                    <p class="pTit"><span class="sName">联想电脑店1</span><span class="sTime">4个月前</span><span
                                                                class="sNum">63楼</span></p>

                                                    <p class="pTxt">从没评论过电影 第一次要吐槽一下 这是我看的最看不懂的电影 不知道演的啥 ！...........</p>

                                                    <p class="pFun clearfix">

                                                        <a href="javascript:void(0);" rel="nofollow" target="_self"
                                                           class="aReply right" name="aReply" tid="774581" pid="0"
                                                           uid="43870913" data-ajax83="ys_dy_2015_detail_pl_hf">

                                                            <i class="iconfont">&#xe604;</i>回复(0)

                                                        </a>

                                                    </p>

                                                    <div class="replyBox" id="comment_774581" style="display:none">

                                                        <i class="replyConArrow"></i>

                                                    </div>

                                                </li>

                                                <li>

                                                    <p class="pTit"><span class="sName">黑龙江游客</span><span
                                                                class="sTime">4个月前</span><span class="sNum">62楼</span></p>

                                                    <p class="pTxt">你舅舅</p>

                                                    <p class="pFun clearfix">

                                                        <a href="javascript:void(0);" rel="nofollow" target="_self"
                                                           class="aReply right" name="aReply" tid="774381" pid="0" uid="0"
                                                           data-ajax83="ys_dy_2015_detail_pl_hf">

                                                            <i class="iconfont">&#xe604;</i>回复(0)

                                                        </a>

                                                    </p>

                                                    <div class="replyBox" id="comment_774381" style="display:none">

                                                        <i class="replyConArrow"></i>

                                                    </div>

                                                </li>

                                            </ul>


                                            <p class="pMoreComment"><a href="http://dianying.2345.com/detail/165794-9.html"
                                                                       target="_blank"
                                                                       data-ajax83="ys_dy_2015_detail_pl_all2"
                                                                       rel="nofollow" title="我不是潘金莲影评">查看全部评论></a></p>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- 评论 end -->

                        <!--第8个广告 start-->

                        <div class="rowIvy mt20 clearfix">

                            <div class="ivyAuto">



                            </div>

                        </div>

                        <!--第8个广告 end-->

                    </div>

                    <!-- 左栏内容 -->

                    <!-- 右栏内容 -->

                    <div class="col_b">

                        <!--第3个广告 start-->

                        <div class="rowIvy mt20 clearfix">

                            <div class="ivy250">



                            </div>

                        </div>

                        <!--第3个广告 end-->

                        <!-- 本周热播榜 start -->

                        <div class="v_mod mt15">

                            <div class="v_th_s">

                                <span class="sMark">本周热播榜</span>

                                <a class="aMore_left" href="http://dianying.2345.com/top/" rel="nofollow" target="_blank">更多></a>

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

                        <!--第4个广告 start-->

                        <div class="rowIvy mt15 clearfix">

                            <div class="ivy250">

                                <embed width="                           250" height="                           250"
                                       type="application/x-shockwave-flash" src="swf/1054837bf6e95edb9c277d888382cb51.swf"
                                       quality="high" wmode="transparent">

                            </div>

                        </div>

                        <!--第4个广告 end-->

                        <!-- 类型分类 begin -->

                        <div class="v_mod mt20 styleList tab-plugin">

                            <div class="v_tb">

                                <div class="v_tab v_tab_250_3 tab-plugin-tab">

                                    <a href="javascript:void(0);" target="_self">电影</a>

                                    <a href="http://tv.2345.com/---.html" target="_blank">电视剧</a>

                                    <a href="http://dongman.2345.com/lt" target="_blank">动漫</a>

                                    <i class="iTabLine"></i>

                                </div>

                                <div class="conList tab-plugin-con">

                                    <dl class="con">

                                        <dt>按类型</dt>

                                        <dd><a href="http://dianying.2345.com/list/aiqing------.html" target="_blank"
                                               title="爱情电影" data-ajax83="ys_dy_2015_detail_leixing_1">爱情电影</a><a
                                                    href="http://dianying.2345.com/list/xiju------.html" target="_blank"
                                                    title="喜剧电影" data-ajax83="ys_dy_2015_detail_leixing_2">喜剧电影</a><a
                                                    href="http://dianying.2345.com/list/kongbu------.html" target="_blank"
                                                    title="恐怖电影" data-ajax83="ys_dy_2015_detail_leixing_3">恐怖电影</a><a
                                                    href="http://dianying.2345.com/list/kehuan------.html" target="_blank"
                                                    title="科幻电影" data-ajax83="ys_dy_2015_detail_leixing_4">科幻电影</a><a
                                                    href="http://dianying.2345.com/list/wuxia------.html" target="_blank"
                                                    title="武侠电影" data-ajax83="ys_dy_2015_detail_leixing_5">武侠电影</a><a
                                                    href="http://dianying.2345.com/list/dongzuo------.html" target="_blank"
                                                    title="动作电影" data-ajax83="ys_dy_2015_detail_leixing_6">动作电影</a><a
                                                    href="http://dianying.2345.com/list/juqing------.html" target="_blank"
                                                    title="剧情电影" data-ajax83="ys_dy_2015_detail_leixing_7">剧情电影</a><a
                                                    href="http://dianying.2345.com/list/xuanyi------.html" target="_blank"
                                                    title="悬疑电影" data-ajax83="ys_dy_2015_detail_leixing_8">悬疑电影</a><a
                                                    href="http://dianying.2345.com/list/donghua------.html" target="_blank"
                                                    title="动画电影" data-ajax83="ys_dy_2015_detail_leixing_9">动画电影</a><a
                                                    href="http://dianying.2345.com/list/zhanzheng------.html"
                                                    target="_blank" title="战争电影" data-ajax83="ys_dy_2015_detail_leixing_10">战争电影</a><a
                                                    href="http://dianying.2345.com/list/qingchun------.html" target="_blank"
                                                    title="青春电影" data-ajax83="ys_dy_2015_detail_leixing_11">青春电影</a><a
                                                    href="http://dianying.2345.com/list/guzhuang------.html" target="_blank"
                                                    title="古装电影" data-ajax83="ys_dy_2015_detail_leixing_12">古装电影</a><a
                                                    href="http://dianying.2345.com/list/weidianying------.html"
                                                    target="_blank" title="微电影" data-ajax83="ys_dy_2015_detail_leixing_13">微电影</a>
                                        </dd>

                                        <dt>按地区</dt>

                                        <dd><a href="http://dianying.2345.com/list/-neidi-----.html" target="_blank"
                                               title="国产电影" data-ajax83="ys_dy_2015_detail_diqu_1">国产电影</a><a
                                                    href="http://dianying.2345.com/list/-meiguo-----.html" target="_blank"
                                                    title="美国电影" data-ajax83="ys_dy_2015_detail_diqu_2">美国电影</a><a
                                                    href="http://dianying.2345.com/list/-xianggang-----.html"
                                                    target="_blank" title="香港电影"
                                                    data-ajax83="ys_dy_2015_detail_diqu_3">香港电影</a><a
                                                    href="http://dianying.2345.com/list/-hanguo-----.html" target="_blank"
                                                    title="韩国电影" data-ajax83="ys_dy_2015_detail_diqu_4">韩国电影</a><a
                                                    href="http://dianying.2345.com/list/-riben-----.html" target="_blank"
                                                    title="日本电影" data-ajax83="ys_dy_2015_detail_diqu_5">日本电影</a></dd>

                                    </dl>

                                </div>

                            </div>

                        </div>                        <!-- 类型分类 end -->

                        <!-- 影院热映 begin -->

                        <div class="v_mod tab-plugin mt15">

                            <div class="v_th_s"><span class="sMark"><a href="http://dianying.2345.com/xinpian/all/"
                                                                       target="_blank">影院热映</a>&nbsp;&bull;&nbsp;票房榜</span>
                            </div>

                            <div class="v_tb">

                                <ul class="v_rank clearfix">

                                    <li><i class="iNum iCurNum">1</i><span class="sTips">4032万</span><a target="_blank"
                                                                                                        href="http://dianying.2345.com/detail/165826.html"
                                                                                                        title="绣春刀修罗战场"
                                                                                                        data-ajax83="ys_dy_2015_detail_pf_1">绣春刀・修罗战场</a>
                                    </li>

                                    <li><i class="iNum iCurNum">2</i><span class="sTips">3131万</span><a target="_blank"
                                                                                                        href="http://dianying.2345.com/detail/178282.html"
                                                                                                        title="悟空传"
                                                                                                        data-ajax83="ys_dy_2015_detail_pf_2">悟空传</a>
                                    </li>

                                    <li><i class="iNum iCurNum">3</i><span class="sTips">2522万</span><a target="_blank"
                                                                                                        href="http://dianying.2345.com/detail/163590.html"
                                                                                                        title="神偷奶爸3"
                                                                                                        data-ajax83="ys_dy_2015_detail_pf_3">神偷奶爸3</a>
                                    </li>

                                    <li><i class="iNum ">4</i><span class="sTips">2517万</span><a target="_blank"
                                                                                                 href="http://dianying.2345.com/detail/191420.html"
                                                                                                 title="父子雄兵"
                                                                                                 data-ajax83="ys_dy_2015_detail_pf_4">父子雄兵</a>
                                    </li>

                                    <li><i class="iNum ">5</i><span class="sTips">765万</span><a target="_blank"
                                                                                                href="http://dianying.2345.com/detail/192247.html"
                                                                                                title="阿唐奇遇"
                                                                                                data-ajax83="ys_dy_2015_detail_pf_5">阿唐奇遇</a>
                                    </li>

                                    <li><i class="iNum ">6</i><span class="sTips">658万</span><a target="_blank"
                                                                                                href="http://dianying.2345.com/detail/192908.html"
                                                                                                title="闪光少女"
                                                                                                data-ajax83="ys_dy_2015_detail_pf_6">闪光少女</a>
                                    </li>

                                    <li><i class="iNum ">7</i><span class="sTips">594万</span><a target="_blank"
                                                                                                href="http://dianying.2345.com/detail/191972.html"
                                                                                                title="大护法"
                                                                                                data-ajax83="ys_dy_2015_detail_pf_7">大护法</a>
                                    </li>

                                    <li><i class="iNum ">8</i><span class="sTips">238万</span><a target="_blank"
                                                                                                href="http://dianying.2345.com/detail/193329.html"
                                                                                                title="绿野仙踪之奥兹国奇幻之旅"
                                                                                                data-ajax83="ys_dy_2015_detail_pf_8">绿野仙踪之奥兹国奇幻之旅</a>
                                    </li>

                                    <li><i class="iNum ">9</i><span class="sTips">208万</span><a target="_blank"
                                                                                                href="http://dianying.2345.com/detail/192888.html"
                                                                                                title="大耳朵图图之美食狂想曲"
                                                                                                data-ajax83="ys_dy_2015_detail_pf_9">大耳朵图图之美食狂想曲</a>
                                    </li>

                                    <li><i class="iNum ">10</i><span class="sTips">132万</span><a target="_blank"
                                                                                                 href="http://dianying.2345.com/detail/193038.html"
                                                                                                 title="深夜食堂2"
                                                                                                 data-ajax83="ys_dy_2015_detail_pf_10">深夜食堂2</a>
                                    </li>

                                </ul>

                            </div>

                        </div>

                        <!-- 影院热映 end -->

                        <!--第7个广告 start-->

                        <!--第7个广告 end-->

                        <!--猜你喜欢1-->
                        <div class="rowIvy mt20 clearfix">

                            <div class="ivy_mod" ivyfixed="top">

                                <div class="tb_ivy">

                                    <div class="ivy250">



                                    </div>

                                </div>

                            </div>

                        </div><!--猜你喜欢1-->

                    </div>

                    <!-- 右栏内容 -->

                </div>

            </div>

        </div>

        <div class="mainBottomBg"></div>

    </div>
@endsection

@section('footer')
    footer
@endsection