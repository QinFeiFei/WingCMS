@extends('pc.tv._tvList')

@section('list_left')
    @include('pc.tv._tvListLeft', ['type' => 'other'])
@endsection

@section('list_list')
    <div class="col_c">
        <!-- 筛选 -->
        <ul class="selectList clearfix">
            <li>
                <span class="sTit">类型：</span>
                <p class="pSelect">
                    <span><a href="{{ route('pc::tvList', ['type' => 'other']) }}?classify=&{{ http_build_query(Request::except('classify', 'tv_type')) }}" class="{{ request('classify', '') == '' ? 'cur' : '' }}">全部</a></span>
                    @forelse($classifys as $classify)
                        <span><a href="{{ route('pc::tvList', ['type' => 'other']) }}?classify={{ $classify['tv_class_id'].'&' }}{{ http_build_query(Request::except('classify', 'tv_type')) }}" class="{{ $classify['tv_class_id']==request('classify', '') ? 'cur' : '' }}">{{ $classify['tv_class_name'] }}</a></span>
                    @empty
                    @endforelse
                </p>
            </li>
        </ul>
        <!-- 筛选 -->

        <!-- 列表 -->
        <div class="v_mod listCon">
            <div class="v_th">
                <i class="iLine"></i>
                <p class="pTab">
                    <a href="{{ route('pc::tvList', ['type' => 'other']) }}?{{ http_build_query(Request::except('orderby', 'tv_type')) }}" class="{{ empty(request('orderby', '')) ? 'cur' : '' }}" id="default">最新更新</a>
                    <a href="{{ route('pc::tvList', ['type' => 'other']) }}?orderby=grade&{{ http_build_query(Request::except('orderby', 'tv_type')) }}" class="{{ request('orderby', '')=='grade' ? 'cur' : '' }}">评分</a>
                </p>
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

                                    <a class="aPlayBtn" href="{{ route('pc::tvDetail', ['type' => 'other', 'tv_id'=>idEncode($tv->tv_id)]) }}" title="{{ $tv->tv_name }}"><i></i></a>
                                </div>

                                <div class="txtPadding">
                                    <span class="sTit">
                                      <em class="emTit"><a title="{{ $tv->tv_name }}" href="{{ route('pc::tvDetail', ['type' => 'other', 'tv_id'=>idEncode($tv->tv_id)]) }}">{{ $tv->tv_name }}</a></em>
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