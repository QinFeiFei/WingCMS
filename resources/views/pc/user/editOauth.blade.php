@extends('pc.layouts.user')
@section('title', '第三方授权')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/useraccount.css">
@endsection

@section('content')
    @include('pc.user._nav', ['navpos'=>'two'])
    <div class="main main_position clearfix">
        @include('pc.user._leftBar')
        <div class="account_right" style=" height:500px;">

        <!--第三方授权 开始-->
        <div class="changeThirdparty">
            <h2 class="pf">第三方授权</h2>
            <ul>
                <li>
                    <div class="widthLeft"><img src="{{ asset('/pc/user') }}/qq.png" alt=""><span class="c_blue">已授权</span></div>
                    <div class="widthCenter">
                        账号：Wing
                    </div>
                    <a class="btn gray unbind" href="javascript:void(0);">取消授权</a>
                </li>
                <li>
                    <div class="widthLeft"><img src="{{ asset('/pc/user') }}/weixin.png" alt=""><span class="c_blue">未授权</span></div>
                    <div class="widthCenter"></div>
                    <a class="btn blue" href="">获取授权</a>
                </li>

            </ul>
        </div><!--changeEmail-A end-->
        <!--第三方授权 结束-->

    </div>
    </div>
@endsection