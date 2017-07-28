<div class="header" id="vheader">
    <div class="headerFun" id="headerFun">
        <div class="headerCon clearfix">
            <a href="http://kan.2345.com" target="_self" onclick="ysCS.posClick('ys_top_logo');" title="2345影视"
               class="aHeaderLogo"></a>
            <!--左侧广告 start-->
            <!---->
            <!--左侧广告 end-->
            <div class="headerSearch">
                <div class="searchBorder">
                    <input type="text" defaultTxt="搜索关键词" value="搜索关键词" class="searchInput" id="keyword"
                           autocomplete="off">
                    <a href="http://kan.2345.com/top/rank.html" target="_blank" class="aRank"
                       onclick="ysCS.posClick('ys_top_phb');"><i class="iconfont">&#xe612;</i></a>
                </div>
                <form id="search_form" method="post"></form>
                <a href="javascript:void(0);" class="aSearchBtn" target="_self" id="search"><i class="iconfont">
                        &#xe606;</i>搜索</a>
                <!--无搜索词 start-->
                <div class="association todayHotSearch" style="display:none" id="hotKeyWord">
                </div>
                <!--无搜索词 end-->
                <!--搜索联想 start-->
                <div style="display:none" id="search_result" class="association searchAssociate clearfix"></div>
                <!--搜索联想 end-->
            </div>
            <!--右侧广告 start-->
            <!--		<div class="headerRightIvy" id="ivyRight">
                <a title="极限挑战3" target="_blank" href="http://kan.2345.com/zongyi/zy_35750/" rel="nofollow" onclick="ysCS.posClick('ys_top_img');" title="极限挑战3"><img width="170" height="50" src="http://imgwx2.2345.com/dypcimg/top/ivy/bd4512df3e012e223af17d3eb6232c8e.jpg" alt="极限挑战3"></a>
            </div>
            -->
            <!--右侧广告 start-->
            <div class="headerFeatures clearfix">
                <!-- 登录注册 -->
                <div class="more_mod userLogin">
                    <span class="sMore"><a href="javascript:void(0);" target="_self" id="user-login"
                                           onclick="ysCS.posClick('ys_top_login2345');"><i class="iUser"></i><em>登录</em></a></span>
                    <div class="more_tb">
                        <i class="iArrow"></i>
                        <div class="more_mod_border clearfix" id="user-login-list">
                            <a href="javascript:void(0);" target="_self" id="user-login2"
                               onclick="ysCS.posClick('ys_top_login2345');">登录</a>
                            <a href="javascript:void(0);" target="_self" id="user-reg"
                               onclick="ysCS.posClick('ys_top_reg');">注册</a>
                            <i class="clear"></i>
                        </div>
                    </div>
                </div>
                <!-- 登录注册 -->
                <!-- 观看记录 -->
                <div class="more_mod watchHistory" id="a-person-watch-info">
                    <span class="sMore"><a href="http://kan.2345.com/user/index.php?type=watch" id="a-person-watch"
                                           target="_blank" onclick="ysCS.posClick('ys_top_history');"><i
                                    class="iHistory"></i><em>看过</em></a></span>
                    <div class="more_tb">
                        <i class="iArrow"></i>
                        <div class="more_mod_border clearfix">
                            <ul class="historyList clearfix" id="a-person-watch-detail">
                                <li class="liNoRecord noHover"><p class="pNoRecord">暂无观看记录</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- 观看记录 -->

                <!-- APP下载 -->
                <div class="more_mod downloadApp">
                    <span class="sMore"><a href="http://download.duote.org/2345moive_app.exe" target="_self"
                                           data-ajax83="ys_top_download1"><i
                                    class="iPhone"></i><em>下载桌面版</em></a></span>
                </div>
                <!-- APP下载 -->
            </div>
        </div>
    </div>
    @include('pc.layouts.top_nav')
</div>