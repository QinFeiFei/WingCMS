@extends('pc.tv._tvList')

@section('list_left')
    @include('pc.tv._tvListLeft', ['type' => 'movie'])
@endsection

@section('list_list')
    <div class="col_c">
        <!-- 筛选 -->
        <ul class="selectList clearfix">
            <li>
                <span class="sTit">类型：</span>
                <p class="pSelect">
                    <span><a href="{{ route('pc::movieList') }}?classify=&{{ http_build_query(Request::except('classify', 'tv_type')) }}" class="{{ request('classify', '') == '' ? 'cur' : '' }}">全部</a></span>
                    @forelse($classifys as $classify)
                        <span><a href="{{ route('pc::movieList') }}?classify={{ $classify['value'].'&' }}{{ http_build_query(Request::except('classify', 'tv_type')) }}" class="{{ $classify['value']==request('classify', '') ? 'cur' : '' }}">{{ $classify['label'] }}</a></span>
                    @empty
                    @endforelse
                </p>
            </li>
            <li>
                <span class="sTit">地区：</span>
                <p class="pSelect">
                    <span><a href="{{ route('pc::movieList') }}?tv_area=&{{ http_build_query(Request::except('tv_area', 'tv_type')) }}" class="{{ request('tv_area', '') == '' ? 'cur' : '' }}">全部</a></span>
                    @forelse($areas as $area)
                        <span><a href="{{ route('pc::movieList') }}?tv_area={{ $area['value'].'&' }}{{ http_build_query(Request::except('tv_area', 'tv_type')) }}" class="{{ $area['value']==request('tv_area', '') ? 'cur' : '' }}">{{ $area['label'] }}</a></span>
                    @empty
                    @endforelse
                </p>
            </li>
            <li>
                <span class="sTit">年代：</span>
                <p class="pSelect">
                    <span><a href="{{ route('pc::movieList') }}?tv_show_year=&{{ http_build_query(Request::except('tv_show_year', 'tv_type')) }}" class="{{ request('tv_show_year', '') == '' ? 'cur' : '' }}">全部</a></span>
                    @forelse($years as $year)
                        <span><a href="{{ route('pc::movieList') }}?tv_show_year={{ $year['value'].'&' }}{{ http_build_query(Request::except('tv_show_year', 'tv_type')) }}" class="{{ $year['value']==request('tv_show_year', '') ? 'cur' : '' }}">{{ $year['label'] }}</a></span>
                    @empty
                    @endforelse
                </p>
            </li>

            <!--
            <li>
                <span class="sTit">状态：</span>
                <p class="pSelect">
                    <span><a target="_self" href="" class="cur" rel="nofollow">全部</a></span>
                    <span><a rel="nofollow" href="" target="_self">免费片</a></span>
                    <span><a rel="nofollow" href="" target="_self">预告片</a></span>
                    <span><a rel="nofollow" href="" target="_self">会员片</a></span>
                </p>
            </li>
            -->
        </ul>
        <!-- 筛选 -->

        <!-- 列表 -->
        <div class="v_mod listCon">
            <div class="v_th">
                <i class="iLine"></i>
                <p class="pTab">
                    <a href="{{ route('pc::movieList') }}?{{ http_build_query(Request::except('orderby', 'tv_type')) }}" class="{{ empty(request('orderby', '')) ? 'cur' : '' }}" id="default">最新更新</a>
                    <a href="{{ route('pc::movieList') }}?orderby=grade&{{ http_build_query(Request::except('orderby', 'tv_type')) }}" class="{{ request('orderby', '')=='grade' ? 'cur' : '' }}">评分</a>
                </p>
                {{--<a class="aLatestNews" target="_blank" href="http://dianying.2345.com/top/">电影排行榜</a>--}}
                <div class="pSelected"></div>
            </div>

            <div class="v_tb">
                <div class="v_picConBox mt15" id="contentList">
                    <ul class="v_picTxt pic180_240 clearfix">
                        @forelse ($list as $tv)
                            <li media="{{ idEncode($tv->tv_id) }}">
                                <div class="pic">
                                    <img src="{{ asset('storage/'.$tv->tv_cover) }}" onerror="javascript:this.src='{{ asset('pc/images/v_defaultPic.png') }}';" alt="{{ $tv->tv_name }}">
                                    <span class="pRightBottom"><em>{{ $tv->tv_grade }}分</em></span>

                                    <a class="aPlayBtn" href="{{ route('pc::movieDetail', ['tv_id'=>idEncode($tv->tv_id)]) }}" title="{{ $tv->tv_name }}"><i></i></a>
                                </div>

                                <div class="txtPadding">
                                    <span class="sTit">
                                      <em class="emTit"><a title="{{ $tv->tv_name }}" href="{{ route('pc::movieDetail', ['tv_id'=>idEncode($tv->tv_id)]) }}">{{ $tv->tv_name }}</a></em>
                                    </span>

                                    <span class="sDes">
                                        主演：
                                        @forelse($tv->tv_actors->actors as $actor)
                                            <em>{{ $actor }}&nbsp;&nbsp;</em>&nbsp;
                                        @empty
                                        @endforelse
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

@section('footer')
@endsection