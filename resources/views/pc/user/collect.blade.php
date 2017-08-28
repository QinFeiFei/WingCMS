@extends('pc.layouts.user')
@section('title', '基本资料')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/useraccount.css">
    <link href="{{ asset('pc/css') }}/global_v4.css" rel="stylesheet" type="text/css"/>
    <style>
        .pf { margin-bottom:15px;}
        body {background:none;}
        .pfooter {font-size:12px;}
        .v_picTxt li {position:relative;}
        .remove {cursor:pointer;z-index:99;background:url("{{ asset('/pc/user/icon_close.jpg') }}") center center;width:30px;height:30px;position:absolute;top:0px;right:0px;display:none;}
        .v_picTxt li:hover .remove {display:block;}
    </style>
@endsection

@section('content')
    @include('pc.user._nav', ['navpos'=>'three'])
    <div class="main main_position clearfix">
        @include('pc.user._leftBar')
        <div class="account_right">
            <h2 class="pf">影视收藏</h2>

            <ul class="v_picTxt pic180_240 pic180_210 clearfix">
            @forelse($list as $info)
                <li>
                    <div class="pic">
                        <img src="{{ asset('storage/'.$info->tv->tv_cover) }}" onerror="javascript:this.src='{{ asset('pc/images/v_defaultPic.png') }}';" />
                        <a class="aPlayBtn" href="{{ route('pc::tvDetail', ['type'=>'teleplay', 'tv_id'=>idEncode($info->tv_id)]) }}"><i></i></a>
                    </div>
                    <div class="txtPadding">
                        <span class="sTit">
                            {{--<em class="emScore">8.4</em>--}}
                            <em class="emTit"><a href="{{ route('pc::tvDetail', ['type'=>'teleplay', 'tv_id'=>idEncode($info->tv_id)]) }}">{{ $info->tv->tv_name }}</a></em>
                        </span>
                        <span class="sDes">{{ $info->tv->tv_brief }}</span>
                    </div>
                    <span class="remove" data-id="{{ $info->collect_id }}"></span>
                </li>
            @empty
                暂无记录
            @endforelse
            </ul>

            <div style="text-align: center">
                {!! $list->render() !!}
            </div>
        </div>
    </div>
@endsection

@section('footer')

<script>
    $(function(){
        $('.remove').click(function(){
            var id = $(this).attr('data-id');
            $.post('{{ route('pc::collectDelete') }}', {id: id, _token:'{{ csrf_token() }}' }, function(data){
                if(data.code == 0){
                    window.location.reload()
                }else{
                    alert(data.msg)
                }
            })
        });
    })
</script>
@endsection