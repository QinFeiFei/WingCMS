@extends('pc.layouts.home')

@section('content')
<div class="wrapper">
        <div class="main">
            <!-- 电视剧 start -->
            <div class="row clearfix">
                <div class="col_c">
                    <!-- 热播电视剧 start -->
                    <div class="v_mod mt30">
                        <div class="v_th">
                            <span class="sMark"><i class="iTvIcon"></i>热播电视剧</span>
                            <a href="{{ route('pc::tvList', ['type'=>'teleplay']) }}" class="aMore_left">更多&gt;</a>
                        </div>
                        <div class="v_tb">
                            <div class="v_picConBox">
                                <ul class="v_picTxt pic180_240 pic180_210 clearfix">
                                    @forelse($teleplay['puts'] as $k=>$value)
                                    <li>
                                        <div class="pic">
                                            <img src="{{ asset('storage/'.$value->tv_cover) }}" onerror="javascript:this.src='{{ asset('pc/images/v_defaultPic.png') }}';" />
                                            <a class="aPlayBtn" href="{{ route('pc::tvDetail', ['type'=>'teleplay', 'tv_id'=>idEncode($value->tv_id)]) }}"><i></i></a>
                                        </div>
                                        <div class="txtPadding">
                                            <span class="sTit">
                                                {{--<em class="emScore">8.4</em>--}}
                                                <em class="emTit"><a href="{{ route('pc::tvDetail', ['type'=>'teleplay', 'tv_id'=>idEncode($value->tv_id)]) }}">{{ $value->tv_name }}</a></em>
                                            </span>
                                            <span class="sDes">{{ $value->tv_brief }}</span>
                                        </div>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col_d">
                    <div class="v_mod mod-home-rank">
                        <div class="v_th_s">
                            <span class="sMark"><a href="">近期更新的电视剧</a></span>
                        </div>
                        <div class="v_tb">
                            <div class="v_conBox">
                                <ul class="v_rank clearfix">
                                    @forelse($teleplay['news'] as $k=>$value)
                                    <li>
                                        <i class="iNum {{ $k<3 ? 'iCurNum' : '' }}">{{ $k+1 }}</i>
                                        {{--<span class="sTips">8.3分</span>--}}
                                        <a href="{{ route('pc::tvDetail', ['type'=>'teleplay', 'tv_id'=>idEncode($value->tv_id)]) }}">{{ $value->tv_name }}</a>
                                    </li>
                                    @empty
                                    <li>暂无更新</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- 电视剧 end -->

            <!-- 电影 start -->
            <div class="row clearfix">
                <div class="col_c">
                    <!-- 热播电影 start -->
                    <div class="v_mod mt30">
                        <div class="v_th">
                            <span class="sMark"><i class="iMovieIcon"></i>热播电影</span>
                            <a href="{{ route('pc::tvList', ['type'=>'movie']) }}" class="aMore_left">更多&gt;</a>
                        </div>
                        <div class="v_tb">
                            <div class="v_picConBox height612">
                                <ul class="v_picTxt pic180_240 pic180_210 clearfix">
                                    @forelse($movie['puts'] as $k=>$value)
                                    <li>
                                        <div class="pic">
                                            <img src="{{ asset('storage/'.$value->tv_cover) }}" onerror="javascript:this.src='{{ asset('pc/images/v_defaultPic.png') }}';" />
                                            <a class="aPlayBtn" href="{{ route('pc::tvDetail', ['type'=>'movie', 'tv_id'=>idEncode($value->tv_id)]) }}"><i></i></a>
                                        </div>
                                        <div class="txtPadding">
                                            <span class="sTit">
                                                {{--<em class="emScore">8.4</em>--}}
                                                <em class="emTit"><a href="{{ route('pc::tvDetail', ['type'=>'movie', 'tv_id'=>idEncode($value->tv_id)]) }}">{{ $value->tv_name }}</a></em>
                                            </span>
                                            <span class="sDes">{{ $value->tv_brief }}</span>
                                        </div>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- 热播电影 end -->
                </div>
                <div class="col_d">
                    <div class="v_mod mod-home-rank">
                        <div class="v_th_s">
                            <span class="sMark"><a href="">近期更新的电影</a></span>
                        </div>
                        <div class="v_tb">
                            <div class="v_conBox">
                                <ul class="v_rank clearfix">
                                    @forelse($movie['news'] as $k=>$value)
                                        <li>
                                            <i class="iNum {{ $k<3 ? 'iCurNum' : '' }}">{{ $k+1 }}</i>
                                            {{--<span class="sTips">8.3分</span>--}}
                                            <a href="{{ route('pc::tvDetail', ['type'=>'movie', 'tv_id'=>idEncode($value->tv_id)]) }}">{{ $value->tv_name }}</a>
                                        </li>
                                    @empty
                                        <li>暂无更新</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- 电影 end-->

        </div>
    </div>
@endsection

@section('footer')
@endsection