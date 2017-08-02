<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <title>用户中心-注册</title>
    <meta name="Description" content="">
    <meta name="Keywords" content="">
    <link rel="stylesheet" href="{{ asset('pc/css/login.css') }}" />
</head>
<body>
<div class="header">
    <div class="headerCon">
        <div class="logo">
            <a href="/" class="logoPic" onclick="cc('R1');">
                <img src="images/logo.png" alt="" title="" width="203" height="71">
            </a>
            <span class="sTxt">注册帐号</span>
        </div>
        <p class="pRight">我已有2345帐号，<a id = "forwardtip" href="/login" onclick="cc('R12')">立即登录</a></p>
    </div>
</div>
<div class="wrapper">
    <div class="main clearfix pb25" id="loginForm">
        <div class="col_a">
            <span class="sNotice">注册成功后，您的帐号将可以登录2345旗下所有产品</span>
            <div class="loginCon">
                <div class="con" id="tel-con">
                    <form id='myFormPhone' method='post' onsubmit="return checkAll('phone');">
                        <ul class="ulForm clearfix">
                            <input type="text" name="validate" id="validatehide" autocomplete="off" value="" style="display: none">
                            <li>
                                <span class="sTit">手机号：</span>
                                <div class="tips" id="msg_username_phone" style="display:none"><span class="sError">验证码不能为空</span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="username" type="text" id="username_phone" value="" autocomplete='off' onclick="cc('R2')">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">手机验证码：</span>
                                <div class="tips" id='msg_validate_phone' style="display: none;"><span class="sError">验证码不能为空</span></div>
                                <div class="formCon">
                                    <div class="loginCode">
                                        <div class="inputTxt">
                                            <input name="validate_phone" id="validate_phone" type="text" value="" onclick="cc('R3')">
                                            <i class="iRight" style="display: none"></i>
                                        </div>
                                        <a href="#" target="_self" class="aMessageCode" id="btn_yzm_phone" action='sms' onclick="cc('R4')">获取验证码</a>
                                        <span class="messageCode_disable" id="btn_yzmed_phone" style="display:none">重新发送（60）</span>
                                    </div>
                                </div>
                                <div class="voiceTips" id='form-tips-voice-msg' style="display: none">
                                    <p class="pTips">如果短信未收到，请拨打客服电话400-000-2345<br>（周一至周五 9:00-18:00，节假日除外）</p>
                                </div>
                                <!--div class="voiceTips" id='form-tips-voice-msg' style="display: none">
                                    <p class="pTips">系统将在1分钟内拨打您的手机&nbsp;(&nbsp;来电号码可能显示为<em>未知号码</em>或<em>4000633481</em>&nbsp;)【<a href="javascript:;" onclick="showPopWx();return false;">我未收到来电</a>】</p>
                                    <div class="voicePop" id="demo-pop-wx" style="display: none">
                                        <i class="iArrow"></i>
                                        <div class="txt">
                                            <p><em class="emNum">1.</em>先关闭手机上的管家、卫士等软件再重新获取，<a href="http://chrome.2345.com/help/voiceverification_pc.htm" target="_blank">查看关闭教程</a></p>
                                            <p><em class="emNum">2.</em>如尝试多次仍然没有收到来电，请点击该处<a id="btn_yzm_phone_sms" href="javascript:void(0);">发送短信验证码</a></p>
                                            <p><em class="emNum">3.</em>如果电话和短信均未收到，请拨打客服电话400-000-2345<br>（周一至周五 9:00-18:00，节假日除外）</p>
                                        </div>
                                    </div>
                                </div-->
                            </li>
                            <li>
                                <span class="sTit">密码：</span>
                                <div class="tips" id='msg_pwd_phone' style="display: none"><span class="sError"></span></div>
                                <div class="tips" id='pwd_strong_phone' style="display: none;">
                                    <p class="pPasswordHard level4"><em>密码强度</em><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i><em class="emStyle">极强</em></p>
                                    <input name="pwd_strength_phone" type="hidden" id="pwd_strength" value="1">
                                </div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="password" id="password_phone" type="password" maxlength="16" autocomplete='off' onkeyup="safe('keyup', 'phone');" onblur="safe('blur', 'phone'); checkRepass('phone');" onclick="cc('R5')">
                                        <i class="iRight" style="display: none"></i>
                                    </div>
                                </div>
                            </li>
                            <!-- <li>
                                <span class="sTit">请确认密码：</span>
                                <div class="tips" id="msg_repassword_phone" style="display: none"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="repassword" id='repassword_phone' type="password" maxlength="16" autocomplete='off' onblur="checkRepass('phone');" onfocus="jQuery('#msg_repassword_email').hide();">
                                        <i class="iRight" style="display: none"></i>
                                    </div>
                                </div>
                            </li> -->
                            <li>
                                <span class="sTit">&nbsp;</span>
                                <div class="tips" id="msg_agree"><span class="sError"></span></div>
                                <div class="formCon">
                                    <span class="sCheck"><input type="checkbox" onclick="checkAgree('');cc('R6')" checked class="checkbox" id="agree" name="agree">我同意<a href="/licence.html" target="_blank" onclick="cc('R7')">《服务协议》</a>、<a href="/declare.html" target="_blank" onclick="cc('R8')">《隐私声明》</a></span>
                                </div>
                            </li>
                            <input name="refer" type="hidden" value="" />
                            <input name="reg_type" type="hidden" id = 'reg_type_phone' value="username" />
                            <li>
                                <span class="sTit">&nbsp;</span>
                                <div class="formCon">
                                    <a type="button" class="btnStyle" href="###" onclick="cc('R9');return checkAll('phone');return false;">注册2345帐号</a>             </div>
                            </li>
                            <li class="mtb12">
                                <span class="sTit">&nbsp;</span>
                                <div class="formCon fontStyle">您还可以使用 <a class="btn-email" href="javascript:" onclick="cc('R10')">邮箱注册</a></div>
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="con" id="email-con" style="display:none;">
                    <form id='myFormEmail' method='post' onsubmit="return checkAll('email');">
                        <ul class="ulForm clearfix">
                            <li>
                                <span class="sTit">邮箱：</span>
                                <div class="tips" id="msg_username_email" style="display:none"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="username" type="text" id='username_email' value="" autocomplete='off' onblur="checkEmail();" onclick="cc('R13')">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">密码：</span>
                                <div class="tips" id='msg_pwd_email' style="display: none"><span class="sError"></span></div>
                                <div class="tips" id='pwd_strong_email' style="display: none;">
                                    <p class="pPasswordHard level4"><em>密码强度</em><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i><em class="emStyle">极强</em></p>
                                    <input name="pwd_strength_email" type="hidden" id="pwd_strength_email" value="1">
                                </div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="password" id="password_email" type="password" maxlength="16" autocomplete='off' onkeyup="safe('keyup', 'email');" onblur="safe('blur', 'email'); checkRepass('email');" onclick="cc('R14')">
                                        <i class="iRight" style="display: none"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">请确认密码：</span>
                                <div class="tips" id='msg_repassword_email' style="display: none"><span class="sError"></span></div>
                                <div class="formCon">
                                    <div class="inputTxt">
                                        <input name="repassword" id='repassword_email' type="password" maxlength="16" autocomplete='off' onblur="checkRepass('email');" onfocus="jQuery('#msg_repassword_email').hide();" onclick="cc('R15')">
                                        <i class="iRight" style="display: none"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">图片验证码：</span>
                                <div class="tips" id="msg_validate_email" style="display: none"><span class="sError">验证码不能为空</span></div>
                                <div class="formCon">
                                    <div class="loginCode">
                                        <div class="inputTxt">
                                            <input name="validate" id="validate_email" type="text" value="" autocomplete='off' onclick="cc('R16')">
                                            <i class="iRight" style="display: none"></i>
                                        </div>
                                        <div class="codePic">
                                                <span class="sPic">
                            <img src="other/.com/Captcha" id="Pic_email" alt="图片验证码" onclick="jQuery('#Pic_email').attr('src', 'other/.com/Captcha?I' + Math.random()); return false;" width="88" height="40">
                        </span>
                                            <a onclick="cc('R17');jQuery('#Pic_email').attr('src', 'other/.com/Captcha?I' + Math.random()); return false;" class="right" href="#">换一换</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="sTit">&nbsp;</span>
                                <div class="tips" id="msg_agree_email"><span class="sError"></span></div>
                                <div class="formCon">
                                    <span class="sCheck"><input type="checkbox" onclick="cc('R6');checkAgree('email')" checked class="checkbox" id="agree_email" name="agree" onclick="cc('R6')">我同意<a href="/licence.html" target="_blank" onclick="cc('R7')">《服务协议》</a>、<a href="/declare.html" target="_blank" onclick="cc('R8')">《隐私声明》</a></span>
                                </div>
                            </li>
                            <input name="refer" type="hidden" value="" />
                            <input name="reg_type" type="hidden" id = 'reg_type_email' value="username" />
                            <li>
                                <span class="sTit">&nbsp;</span>
                                <div class="formCon">
                                    <a type="button" class="btnStyle" href="###" onclick="cc('R18');return checkAll('email');return false;">注册2345帐号</a>
                                    </div9
                            </li>
                            <li class="mtb12">
                                <span class="sTit">&nbsp;</span>
                                <div class="formCon fontStyle">返回 <a class="btn-tel" href="javascript:" onclick="cc('R19')">手机注册</a></div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <div class="col_b">
            <div class="ivy270">
                <img src="images/local.jpg" alt="" title="" width="270" height="340" onclick="cc('R11')">
            </div>
        </div>
    </div>
</div>
<!--遮罩-->
<div class="mask">遮罩</div>
<div class="security-code">
    <a class="btn-close" href="javascript:">关闭弹框</a>
    <p class="code-tit">请输入图片中的四位数字：</p>
    <div class="h80">
        <div class="condeWrap">
                <span class="codePic2">
                <img width="88" height="40" id="Pic" alt="图片验证码" src="other/.com/Captcha" onclick="jQuery('#Pic').attr('src', 'other/.com/Captcha?I' + Math.random());return false;"></span>
            <div class="boxInput inputTxt">
                <input type="text" name="validate" id="validate" autocomplete="off" value="请输入验证码">
                <i class="icon" style=" display:none;"></i>
            </div>
            <a class="btn-changeCode" onclick="jQuery('#Pic').attr('src', 'other/.com/Captcha?I' + Math.random()); return false;" href="#">换一换</a>
        </div>
        <p class="boxError" id="msg_validate"></p>
    </div>
    <a class="btn-ok" id="confirmCode" href="javascript:">确定</a>
</div>
<div class="footer">
    <div class="footerCon">
        <a href="http://www.2345.com/about/about.htm" target="_blank" onclick="cc('L14')">关于2345</a><em>|</em>
        <a href="http://www.2345.com/about/socially.htm" target="_blank" onclick="cc('L15')">公益</a><em>|</em>
        <a href="/declare.html" target="_blank" onclick="cc('L16')">隐私声明</a><em>|</em>
        <a href="http://www.2345.net/join_us/" target="_blank" onclick="cc('L17')">诚聘英才</a><em>|</em>&nbsp;版权所有&nbsp;&copy;&nbsp;2345.com&nbsp;
        <a href="http://www.2345.com/icp.jpg" target="_blank" onclick="cc('L18')">ICP证沪B2-20120099</a>&nbsp;诚信上网&nbsp;规范经营
    </div>
</div>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/tab_201509011442.js"></script>
<script type="text/javascript" src="js/reg_20160620.js"></script>
<script type="text/javascript" src="js/zxcvbn.js"></script>
<div style="display: none">
    <script type="text/javascript" src="js/.org/js/userc2345"></script>
</div>
<script>
    $(".btn-close").bind("click",function()
    {
        $(".mask,.security-code").hide();
        $("#validatehide").val($("#validate").val());
    });
    var forwardurl = getUrlParam('forward');
    if(forwardurl != null)
    {
        $("#forwardtip").prop("href", "/login.php?forward=" + forwardurl);
    }
    function getUrlParam(paraname) {
        var urlforward = new RegExp("(^|&)" + paraname + "=([^&]*)(&|$)");
        var forwardmatch = window.location.search.substr(1).match(urlforward);
        if (forwardmatch != null)
        {
            return forwardmatch[2];
        }
        else
        {
            return null; //返回参数值
        }
    }
    //邮件注册和手机注册切换
    $(".btn-email").bind("click",function()
    {
        $(".con").hide();
        $("#email-con").show();
    });
    $(".btn-tel").bind("click",function()
    {
        $(".con").hide();
        $("#tel-con").show();
    });
    function cc(a) {
        var b = arguments,
                web = "ajax54",
                a2,
                i1 = document.cookie.indexOf("uUiD="),
                i2;
        if (b.length > 1)
            web = b[1];
        if (i1 != -1) {
            i2 = document.cookie.indexOf(";", i1);
            a2 = i2 != -1 ? document.cookie.substring(i1 + 5, i2) : document.cookie.substr(i1 + 5)
        }
        if (!a2) {
            a2 = Math.floor(Math.random() * 100000) + "" + new Date().getTime() + Math.floor(Math.random() * 100000);
            document.cookie = "uUiD=" + a2 + ";expires=Thu, 21 Sep 2096 10:37:29 GMT; path=/"
        }
        if (a.length > 0) {
            var c = "http://union2.50bang.org/web/" + web + "?uId2=SPTNPQRLSX&uId=" + a2 + "&r=" + encodeURIComponent(location.href) + "&lO=" + encodeURIComponent(a);
            $.getScript(c);
        }
        return true;
    }
</script>
<script type="text/javascript" src="js/common.js"></script>
</body>
</html>