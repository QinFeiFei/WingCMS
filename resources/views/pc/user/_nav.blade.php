<div class="g-nav">
    <div class="g-nav-row">
        <ul class="g-nav-list clearfix">
            <li class="{{ $navpos=='one' ? 'current':'' }}"><a href="{{ route('pc::userIndex') }}">首页</a></li>
            <li class="{{ $navpos=='two' ? 'current':'' }}"><a href="{{ route('pc::userEditInfo') }}">帐户中心</a></li>
        </ul>
    </div>
</div>