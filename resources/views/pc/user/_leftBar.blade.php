<?php $curBar = request()->route()->getName(); ?>
<div class="account_left">
    <ul class="account_nav">
        <li><a href="{{ route('pc::userEditInfo') }}" class="{{ $curBar=='pc::userEditInfo' ? 'curr_account':'' }}"><i class="icon-b png24"></i>基本资料</a></li>
        <li><a href="{{ route('pc::userEditPassword') }}" class="{{ $curBar=='pc::userEditPassword' ? 'curr_account':'' }}"><i class="icon-c png24"></i>修改密码</a></li>
        <li><a href="javascript:alert('暂未开发');{{-- route('pc::userBindPhone') --}}" class="{{ $curBar=='pc::userBindPhone' ? 'curr_account':'' }}"><i class="icon-d png24"></i>绑定手机</a></li>
        <li><a href="{{ route('pc::userBindEmail') }}" class="{{ $curBar=='pc::userBindEmail' ? 'curr_account':'' }}"><i class="icon-e png24"></i>绑定邮箱</a></li>
        <li><a href="{{ route('pc::userEditAvatar') }}" class="{{ $curBar=='pc::userEditAvatar' ? 'curr_account':'' }}"><i class="icon-a png24"></i>我的头像</a></li>
        <li><a href="javascript:alert('暂未开发');{{-- route('pc::userEditOauth') --}}" class="{{ $curBar=='pc::userEditOauth' ? 'curr_account':'' }}"><i class="icon-g png24"></i>第三方授权</a></li>

        <li><a href="{{ route('pc::collectList') }}" class="{{ $curBar=='pc::collectList' ? 'curr_account':'' }}"><i class="icon-h png24"></i>影视收藏</a></li>
        <li><a href="{{ route('pc::watchList') }}" class="{{ $curBar=='pc::watchList' ? 'curr_account':'' }}"><i class="icon-i png24"></i>浏览记录</a></li>
    </ul>
</div>