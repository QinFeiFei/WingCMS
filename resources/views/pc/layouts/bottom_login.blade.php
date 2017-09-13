<style>
    .footer {
        line-height:30px;
        border-top:none;
    }
</style>

<div class="footer" style="margin-top:20px;">
    <div class="footerCon" style="text-align: center">
        <a href="{{ route('pc::aboutUs') }}">关于我们</a><em>　|　</em>
        <a href="{{ route('pc::contact') }}">联系方式</a><em>　|　</em>
        <a href="{{ route('pc::declare') }}">隐私声明</a><em>　|　</em>
        <a href="{{ route('pc::licence') }}">注册协议</a><em>　|　</em>&nbsp;版权所有&nbsp;&copy;&nbsp;{{ env('APP_NAME') }}&nbsp;
    </div>
    <div style="text-align: center;color:red;">本网站仅提供WEB页面服务，并不提供影片资源存储，也不参与录制、上传</div>
    <div style="text-align: center;color:red;">本网站的内容、图文来自于网络，仅供测试和学习交流，我们尊重他人的合法权益，如有内容侵犯您的合法权益，请及时与我们联系，我们将第一时间安排核实及删除！</div>
</div>