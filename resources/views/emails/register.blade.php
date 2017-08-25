@extends('emails.layout')

@section('content')
验证码：<span style="font-weight:bold;color:#169eff;">{{ $code }}</span>(10分钟内有效)<br />
尊敬的用户，您于 <span style="border-bottom:1px dashed #ccc;"></span> 申请注册，感谢您对我们的支持，有任何疑问可联系我们，或关注微信公众号。
@endsection