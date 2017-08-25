@extends('emails.layout')

@section('content')
验证码：<span style="font-weight:bold;color:#169eff;">{{ $code }}</span>(10分钟内有效)<br />
这是测试邮件！！！
@endsection