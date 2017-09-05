<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title> {{ env('APP_NAME')  }} - Email </title>
    <meta name="Generator" content="">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
</head>
<body>
<div id="qm_con_body">
    <div id="mailContentContainer" class="qmbox qm_con_body_content qqmail_webmail_only">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;background-color: #ebedf0;font-family:'Alright Sans LP', 'Avenir Next', 'Helvetica Neue', Helvetica, Arial, 'PingFang SC', 'Source Han Sans SC', 'Hiragino Sans GB', 'Microsoft YaHei', 'WenQuanYi MicroHei', sans-serif;">
            <tbody>
            <tr>
                <td><table cellpadding="0" cellspacing="0" align="center" width="640">
                        <tbody>
                        <tr>
                            <td style="height:20px;"></td>
                        </tr>
                        <tr>
                            <td height="10"></td>
                        </tr>
                        <tr>
                            <td><table cellpadding="0" cellspacing="0" width="640">
                                    <tbody>
                                    <tr style="line-height: 40px;">
                                        <td width="80" style="padding-left: 290px;"><a href="{{ env('APP_URL') }}" target="_blank"> <img src="{{ env('APP_URL').'/images/logo.svg' }}" width="54"> </a></td>
                                    </tr>
                                    </tbody>
                                </table></td>
                        </tr>
                        <tr>
                            <td height="40"></td>
                        </tr>
                        <tr>
                            <td style="background-color: #fff;border-radius:6px;padding:40px 40px 0;"><table>
                                    <tbody>
                                    <tr height="40">
                                        <td style="padding-left:25px;padding-right:25px;font-size:18px;font-family:'微软雅黑','黑体',arial;"> 尊敬的{{ !empty($user) ? $user->username : '用户'  }}： </td>
                                    </tr>
                                    <tr height="15">
                                        <td></td>
                                    </tr>
                                    <tr height="30">
                                        <td style="padding-left:55px;padding-right:55px;font-family:'微软雅黑','黑体',arial;font-size:14px;line-height:20px;">
                                            @yield('content')
                                        </td>
                                    </tr>
                                    <tr height="20">
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left:55px;padding-right:55px;font-family:'微软雅黑','黑体',arial;font-size:14px;"> 此致<br>
                                            {{ env('APP_NAME') }}团队 </td>
                                    </tr>
                                    <tr height="50">
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table></td>
                        </tr>
                        <tr>
                            <td style="height:40px;"></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;color:#7a8599;font-size: 12px;">
                                <!--
                                <p>
                                    <a style="padding:0 5px;" href="" target="_blank">
                                        <img src="" width="23">
                                    </a>
                                    <a style="padding:0 5px;" href="" target="_blank">
                                        <img src="" width="23">
                                    </a>
                                </p>
                                -->
                                <p style="line-height: 20px;">
                                    <a style="text-decoration: none;color:#7a8599;padding:0 5px;" href="" target="_blank">网站首页</a>
                                    -
                                    <a style="text-decoration: none;color:#7a8599;padding:0 5px;" href="" target="_blank">联系我们</a>
                                    -
                                    <a style="text-decoration: none;color:#7a8599;padding:0 5px;" href="" target="_blank">关于我们</a>
                                    -
                                    <a style="text-decoration: none;color:#7a8599;padding:0 5px;" href="" target="_blank">留言中心</a>
                                </p>
                                <p style="line-height: 20px;">
                                    <span onMouseOver="QMReadMail.showLocationTip(this)" class="readmail_locationTip" onMouseOut="QMReadMail.hideLocationTip(this)">欢迎关注微信公众号：晨曦网盘</span> (各种你想要的资源都有) /
                                    <span style="border-bottom:1px dashed #ccc;z-index:1" t="7" onClick="return false;">{{ env('APP_URL') }}</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="height:50px;"></td>
                        </tr>
                        </tbody>
                    </table></td>
            </tr>
            </tbody>
        </table>
        <img width="1px" height="1px" src="">
        <style type="text/css">
            .qmbox style, .qmbox script, .qmbox head, .qmbox link, .qmbox meta {display: none !important;}
        </style>
    </div>
</div>
</body>
</html>