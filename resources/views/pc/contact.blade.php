@extends('pc.layouts.home')
@section('head')
    <link rel="stylesheet" href="{{ asset('/pc/css') }}/explanation.css">
@endsection

@section('content')
    <div class="wrapper">
        <div class="main clearfix">
            <div class="col_a">
                @include('pc.layouts.helpRight')
            </div>
            <div class="col_b">
                <div class="txt">
                    <div class="contactList clearfix">
                        <dl class="list">
                            <dt>业务合作</dt>
                            <dd>
                                <p>电话：021-60932345-8238<br>Q&nbsp;Q：767218729<br>法务联系：fawu@2345.com</p>
                            </dd>
                        </dl>

                        <dl class="list">
                            <dt>建议反馈</dt>
                            <dd>
                                <p>新浪微博：<a href="http://weibo.com/tv2345" target="_blank">2345影视大全</a><br>微信反馈：yingshi2345</p>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection