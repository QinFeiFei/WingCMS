<div class="header" id="vheader">
    <div class="headerFun" id="headerFun">
        <div class="headerCon clearfix">
            <a href="{{ route('pc::index') }}" class="aHeaderLogo"></a>

            <div class="headerSearch">
                <form action="{{ route('pc::search') }}" id="searchForm" method="get">
                    <div class="searchBorder">
                        <input type="text" name="s" placeholder="搜索关键词" value="{{ request('s', '') }}" class="searchInput" id="keyword">
                        <span class="aRank"></span>
                    </div>
                    <a href="javascript:void(0);" class="aSearchBtn" id="search"><i class="fa fa-search"></i>   搜索</a>
                </form>
            </div>

            <div class="headerFeatures clearfix">
                <!-- 登录注册 -->
                <div class="more_mod userLogin">
                    <span class="sMore">
                        <a href="{{ $user ? route('pc::userIndex') : route('pc::login') }}" id="user-login">
                            <i class="iUser"></i>
                            <em>{{ $user ? $user->username : '立即登陆' }}</em>
                        </a>
                    </span>
                    <div class="more_tb">
                        <i class="iArrow"></i>
                        <div class="more_mod_border clearfix" id="user-login-list">
                            @if($user)
                                <a href="javascript:void(0);" id="user-logout">退出</a>
                            @else
                                <a href="{{ route('pc::login') }}" id="user-login2">登录</a>
                                <a href="{{ route('pc::register') }}" id="user-reg">注册</a>
                            @endif
                            <i class="clear"></i>
                        </div>
                    </div>
                </div>
                <!-- 登录注册 -->
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $('.more_mod').live('mouseover', function () {
                $(this).hasClass('more_mod_show') ? clearTimeout(o) : $(this).addClass('more_mod_show')
            })

            $('.more_mod').live('mouseout', function () {
                var e = $(this);
                o = setTimeout(function () {
                    e.removeClass('more_mod_show')
                }, 10)
            })

            $('#search').click(function(){
                if($('#keyword').val() == ''){ return false; }
                $('#searchForm').submit();
            });

            @if($user)
            $('#user-logout').click(function(){
                $.get('{{ route('pc::logout') }}', function(){
                    window.location.reload()
                });
            });
            @endif
        })
    </script>

    @include('pc.layouts.top_nav')
</div>