@extends('pc.layouts.home')
@section('head')
    <link href="{{ asset('pc/css') }}/list_v4.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="wrapper">
        <div class="main">
            <div class="row mt15 clearfix">
                @yield('list_left')

                @yield('list_list')
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection