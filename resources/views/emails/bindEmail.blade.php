@extends('emails.layout')

@section('content')
验证码：<span style="font-weight:bold;color:#169eff;">{{ $code }}</span>(10分钟内有效)<br />
您的账户申请绑定该邮箱操作(登录IP：{{ request()->getClientIp() }})，若非您本人操作，请尽快 <a href="{{ route('pc::login') }}" target="_blank" style="color:#0c94de">修改密码</a>。
@endsection