<div class="g-nav">
    <div class="g-nav-row">
        <ul class="g-nav-list clearfix">
            <li class="{{ $navpos=='one' ? 'current':'' }}"><a href="{{ route('pc::userIndex') }}">用户首页</a></li>
            <li class="{{ $navpos=='two' ? 'current':'' }}"><a href="{{ route('pc::userEditInfo') }}">帐户中心</a></li>
            <li class="{{ $navpos=='three' ? 'current':'' }}"><a href="{{ route('pc::collectList') }}">影视收藏</a></li>
            <li class="{{ $navpos=='four' ? 'current':'' }}"><a href="{{ route('pc::watchList') }}">浏览记录</a></li>
        </ul>
    </div>
</div>