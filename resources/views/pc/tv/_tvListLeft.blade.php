<div class="col_d">
    <ul class="leftNav clearfix">
        <li><span class="sTit">影片库</span></li>
        <li><a href="javascript:alert('暂未开通VIP专区')" class="vip"><i class="fa fa-address-book"></i>　<em>VIP专区</em></a></li>
        <li class="{{ $type=='movie'? 'cur' : '' }}"><a href="{{ route('pc::movieList') }}"><i class="fa fa-camera"></i>　<em>电影</em></a></li>
        <li class="{{ $type=='teleplay'? 'cur' : '' }}"><a href="{{ route('pc::teleplayList') }}"><i class="fa fa-television"></i>　<em>电视剧</em></a></li>
        <li class="{{ $type=='cartoon'? 'cur' : '' }}"><a href="{{ route('pc::cartoonList') }}"><i class="fa fa-child fa-3"></i>　&nbsp;<em>动漫</em></a></li>
        <li class="{{ $type=='variety'? 'cur' : '' }}"><a href="{{ route('pc::varietyList') }}"><i class="fa fa-podcast"></i>　<em>综艺</em></a></li>
        <li class="{{ $type=='mv'? 'cur' : '' }}"><a href="{{ route('pc::mvList') }}"><i class="fa fa-music"></i>　<em>音乐MV</em></a></li>
        <li class="{{ $type=='openclass'? 'cur' : '' }}"><a href="{{ route('pc::openclassList') }}"><i class="fa fa-graduation-cap"></i>&nbsp;&nbsp;<em>公开课</em></a></li>
        <li class="{{ $type=='other'? 'cur' : '' }}"><a href="{{ route('pc::otherList') }}"><i class="fa fa-eye"></i>　<em>其它</em></a></li>

        <!--
        <li class="liBorder"></li>
        <li><span class="sTit">明星库</span></li>
        <li><a href=""><i class="iconfont">&#xe61b;</i><em>全部明星</em></a></li>
        <li><a href=""><i class="iconfont">&#xe61c;</i><em>男明星</em></a></li>
        <li><a href=""><i class="iconfont">&#xe61a;</i><em>女明星</em></a></li>
        -->
    </ul>
</div>