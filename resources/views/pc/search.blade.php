@extends('pc.layouts.home')

@section('content')
    <div class="wrapper">
        <div class="main">
            <div class="v_picConBox mt15" id="contentList">
                <p style="background:#fff;line-height:50px;text-indent:2em;margin-bottom:20px;">搜索" <span style="color:red;">{{ request('s','') }}</span> "：共找到 <b>{{ $list->total() }}</b> 个内容</p>
                <ul class="v_picTxt pic180_240 clearfix">
                    @forelse ($list as $tv)
                        <li media="{{ idEncode($tv->tv_id) }}">
                            <div class="pic">
                                <img src="{{ asset('storage/'.$tv->tv_cover) }}" onerror="javascript:this.src='{{ asset('pc/images/v_defaultPic.png') }}';" alt="{{ $tv->tv_name }}">
                                <span class="pRightBottom"><em>{{ replaceTvType($tv->tv_type) }} | {{ $tv->tv_grade }}分</em></span>

                                <a class="aPlayBtn" href="{{ route('pc::tvDetail', ['type' => 'movie', 'tv_id'=>idEncode($tv->tv_id)]) }}" title="{{ $tv->tv_name }}"><i></i></a>
                            </div>

                            <div class="txtPadding">
                                <span class="sTit">
                                  <em class="emTit"><a title="{{ $tv->tv_name }}" href="{{ route('pc::tvDetail', ['type' => 'movie', 'tv_id'=>idEncode($tv->tv_id)]) }}">{{ $tv->tv_name }}</a></em>
                                </span>

                                <span class="sDes">{{ $tv->tv_brief }}</span>
                            </div>
                        </li>
                    @empty
                        @include('pc.tv._noResult')
                    @endforelse
                </ul>

                <div style="text-align: center">
                    {!! $list->appends(['s' => request('s', '')])->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection