<div class="headerMenu" id="headerMenu">
    <div class="headerCon clearfix">
        <p class="headerMenu_left">
            <a href="{{ route('pc::index') }}" id="left_1"><span>首页</span></a>

            <a href="{{ route('pc::tvList', ['type'=>'movie']) }}" id="left_2"><span>电影<i class="iHot"></i></span></a>

            <a href="{{ route('pc::tvList', ['type'=>'teleplay']) }}" id="left_3"><span>电视剧</span></a>

            <a href="{{ route('pc::tvList', ['type'=>'cartoon']) }}" id="left_4"><span>动漫</span></a>

            <a href="{{ route('pc::tvList', ['type'=>'variety']) }}" id="left_5"><span>综艺</span></a>
        </p>


        <p class="headerMenu_right">
            {{--<a href="" id="right_1"><span>鬼吹灯之黄皮子坟<i class="iHot"></i></span></a>--}}
        </p>
    </div>
</div>