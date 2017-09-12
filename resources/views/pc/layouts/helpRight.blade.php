<ul class="leftNav clearfix">
    <li>
        <a href="javascript:alert('暂未开发');" >
            <em>留言板</em>
        </a>
    </li>
    <li>
        <a href="{{ route('pc::licence') }}">
            <em>服务协议</em>
        </a>
    </li>
    <li>
        <a href="{{ route('pc::declare') }}">
            <em>隐私政策</em>
        </a>
    </li>
    <li class="{{ Route::currentRouteName()=='pc::aboutUs'? 'cur' : '' }}">
        <a href="{{ route('pc::aboutUs') }}">
            <em>关于我们</em>
        </a>
    </li>
    <li class="{{ Route::currentRouteName()=='pc::contact'? 'cur' : '' }}">
        <a href="{{ route('pc::contact') }}">
            <em>联系方式</em>
        </a>
    </li>
</ul>