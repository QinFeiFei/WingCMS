@extends('pc.layouts.user')
@section('title', '基本资料')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/useraccount.css">
@endsection

@section('content')
    @include('pc.user._nav', ['navpos'=>'two'])
    <div class="main main_position clearfix">
        @include('pc.user._leftBar')
        <div class="account_right">
            <h2 class="pf">头像上传</h2>

        </div>
    </div>
@endsection