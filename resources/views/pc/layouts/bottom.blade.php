<div class="footer">
    <div class="footerAbout">
        <div class="footerCon clearfix">
            <dl class="video">
                <dt>{{ env('APP_NAME') }}</dt>
                <dd class="clearfix">
                    <span><a href="{{ route('pc::tvList', ['type'=>'movie']) }}">电影</a></span>
                    <span><a href="{{ route('pc::tvList', ['type'=>'teleplay']) }}">电视剧</a></span>
                    <span class="wSpan"></span>
                    <span><a href="{{ route('pc::tvList', ['type'=>'variety']) }}">综艺</a></span>
                    <span><a href="{{ route('pc::tvList', ['type'=>'cartoon']) }}">动漫</a></span>
                </dd>
            </dl>

            <i class="iLine"></i>

            <dl class="business">
                <dt>业务合作</dt>
                <dd>微信：tctn_zgl</dd>
                <dd>Q&nbsp;Q： 823461798</dd>
                <dd>技术联系：158133434@qq.com</dd>
            </dl>

            <i class="iLine"></i>

            <dl class="advice">
                <dt>意见反馈</dt>
                <dd>
                    <span><a href="javascript:alert('功能暂未开发')"><i class="iQQ"></i>留言板</a></span>
                    <span><a href="javascript:alert('功能暂未开发');"><i class="fa fa-telegram" aria-hidden="true"></i>  求资源、求种子</a></span>
                </dd>

            </dl>

            <i class="iLine"></i>

            <dl class="downLoad">
                <dt>资源QQ群(点击添加)</dt>
                <dd>
                    <span>一群：<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=1ae5bd0fe7e8ac3855a864a463aa06ad1a2d80fdbcfc5be7ee25a7a8e29410de">627256199</a></span>
                </dd>
            </dl>
        </div>
    </div>

    <div class="footerStatement">
        <div class="footerCon clearfix">
            <!--
            <div class="friendLinks" style="text-align: center">
                <span>友情链接：</span>
                <a href=""></a>
            </div>
            -->

            <p class="pTxt">
                <a href="javascript:void(0)" id="sfadvice">留言板</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="{{ route('pc::licence') }}" target="_blank">用户注册协议</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="{{ route('pc::declare') }}" target="_blank">版权声明</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="{{ route('pc::aboutUs') }}">关于我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="{{ route('pc::contact') }}">联系方式</a>
            </p>

            <div class="copyRight">
                版权所有&nbsp;&copy;&nbsp;{{ env('APP_NAME') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ICP证沪B2-20120099
            </div>

            <p class="pTxt" style="color:red;">本网站的内容、图文来自于网络，我们尊重他人的合法权益，如有内容侵犯您的合法权益，请及时与我们联系，我们将第一时间安排核实及删除！</p>
        </div>

    </div>

</div>