@extends('emails.layout')

@section('content')
验证码：<span style="font-weight:bold;color:#169eff;">{{ $code }}</span>(10分钟内有效)<br />
尊敬的用户，您于 <span style="border-bottom:1px dashed #ccc;"></span> 检测，该功能检测正常。
@endsection