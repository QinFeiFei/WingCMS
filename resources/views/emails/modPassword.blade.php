@extends('emails.layout')

@section('content')
验证码：<span style="font-weight:bold;color:#169eff;">{{ $code }}</span>(10分钟内有效)<br />
您的账户 <a href="mailto:{{ $email }}" target="_blank">{{ $email }}</a> 于 <span style="border-bottom:1px dashed #ccc;">{{ date('Y-m-d H:i:s', time()) }}</span> 申请重置密码。(登录IP：{{ request()->getClientIp() }})，若非您本人操作，请尽快 <a href="{{ route('pc::login') }}" target="_blank" style="color:#0c94de">修改密码或联系我们</a>。
@endsection