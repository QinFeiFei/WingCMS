@extends('pc.layouts.user')
@section('title', '基本资料')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/useraccount.css">
@endsection

@section('content')
<div class="main main_position clearfix">
    <div class="account_left">
        <ul class="account_nav">
            <li><a class="curr_account" href="http://login.2345.com/member/editData"><i class="icon-b png24"></i>基本资料</a>
            </li><li><a href="http://login.2345.com/member/editPassword"><i class="icon-c png24"></i>修改密码</a></li>
                        <li><a href="http://login.2345.com/member/bindPhone"><i class="icon-d png24"></i>绑定手机</a></li>
                                    <li><a href="http://login.2345.com/member/bindEmail"><i class="icon-e png24"></i>绑定邮箱</a></li>
                        <li><a href="http://login.2345.com/member/avatar/index"><i class="icon-a png24"></i>我的头像</a></li>
            <li><a href="http://login.2345.com/member/editOauth/index" onclick="cc(&#39;D1&#39;)"><i class="icon-g png24"></i>第三方授权</a></li>
        </ul>
    </div>    <!--account_left end-->
    <div class="account_right">
        <h2 class="pf">基本资料</h2>

        <div class="m-boxB-bd">
            <div class="m-form">
                <div class="form-item">
                    <span class="form-field ft-bold">真实姓名：</span>
                    <input class="ipt_txt ipt_defa" name="name" type="text" value="">
                </div>
                <div class="form-item">
                    <span class="form-field ft-bold">QQ：</span>
                    <input class="ipt_txt ipt_defa" type="text" name="qq" value="">
                </div>
                <div class="form-item form-item-radio">
                    <span class="form-field ft-bold">性别：</span>
                    <label for="female" class="piece genderItem"><i class="ipt_radio"></i>女士<input style="display: none;" type="radio" name="gender" id="female" value="2"></label>
                    <label for="male" class="piece genderItem"><i class="ipt_radio ipt_radio_cur"></i>男士<input style="display: none;" type="radio" name="gender" id="male" value="1" checked="checked"></label>
                    <label class="piece genderItem" for="nomale"><i class="ipt_radio"></i>保密<input style="display: none;" type="radio" name="gender" id="nomale" value="0"></label>
                </div>
                <div class="form-item" style="z-index: 10">
                    <span class="form-field ft-bold">生日：</span>
                    <div class="m-selectA" id="year">
                        <input type="hidden" name="year" value="0000">

                        <div class="text">年</div>
                        <div class="holder"><i class="arrow-btm"></i></div>
                        <div class="option" style="display:none">
                            <ul>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2011">2011</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2010">2010</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2009">2009</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2008">2008</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2007">2007</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2006">2006</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2005">2005</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2004">2004</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2003">2003</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2002">2002</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2001">2001</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="2000">2000</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1999">1999</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1998">1998</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1997">1997</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1996">1996</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1995">1995</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1994">1994</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1993">1993</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1992">1992</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1991">1991</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1990">1990</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1989">1989</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1988">1988</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1987">1987</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1986">1986</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1985">1985</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1984">1984</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1983">1983</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1982">1982</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1981">1981</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1980">1980</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1979">1979</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1978">1978</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1977">1977</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1976">1976</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1975">1975</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1974">1974</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1973">1973</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1972">1972</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1971">1971</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1970">1970</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1969">1969</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1968">1968</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1967">1967</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1966">1966</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1965">1965</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1964">1964</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1963">1963</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1962">1962</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1961">1961</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1960">1960</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1959">1959</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1958">1958</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1957">1957</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1956">1956</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1955">1955</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1954">1954</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1953">1953</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1952">1952</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1951">1951</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1950">1950</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1949">1949</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1948">1948</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1947">1947</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1946">1946</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1945">1945</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1944">1944</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1943">1943</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1942">1942</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1941">1941</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1940">1940</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1939">1939</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1938">1938</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1937">1937</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1936">1936</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1935">1935</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1934">1934</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1933">1933</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1932">1932</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1931">1931</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1930">1930</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1929">1929</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1928">1928</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1927">1927</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1926">1926</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1925">1925</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1924">1924</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1923">1923</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1922">1922</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1921">1921</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1920">1920</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1919">1919</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1918">1918</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1917">1917</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1916">1916</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1915">1915</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1914">1914</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="1913">1913</a></li>
                                                            </ul>
                        </div>
                    </div>
                    <div class="m-selectA" id="month">
                        <input type="hidden" name="month" value="00">

                        <div class="text">月</div>
                        <div class="holder"><i class="arrow-btm"></i></div>
                        <div class="option" style="display:none">
                            <ul>
                                                                <li><a href="http://login.2345.com/member/editData#" value="01">01</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="02">02</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="03">03</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="04">04</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="05">05</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="06">06</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="07">07</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="08">08</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="09">09</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="10">10</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="11">11</a></li>
                                                                <li><a href="http://login.2345.com/member/editData#" value="12">12</a></li>
                                                            </ul>
                        </div>
                    </div>
                    <div class="m-selectA" id="day">
                        <input type="hidden" name="day" value="00">

                        <div class="text">日</div>
                        <div class="holder"><i class="arrow-btm"></i></div>
                        <div class="option" style="display:none">
                            <ul>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-item" style="z-index: 9">
                    <span class="form-field ft-bold">地区：</span>

                    <div class="m-selectA" id="mcl">
                        <input type="hidden" name="area1" value="100000">

                        <div class="text">省</div>
                        <div class="holder"><i class="arrow-btm"></i></div>
                        <div style="display:none" class="option">
                            <ul><li><a href="http://login.2345.com/member/editData#" value="100000">省</a></li><li><a href="http://login.2345.com/member/editData#" value="110000">北京</a></li><li><a href="http://login.2345.com/member/editData#" value="120000">天津</a></li><li><a href="http://login.2345.com/member/editData#" value="130000">河北省</a></li><li><a href="http://login.2345.com/member/editData#" value="140000">山西省</a></li><li><a href="http://login.2345.com/member/editData#" value="150000">内蒙古自治区</a></li><li><a href="http://login.2345.com/member/editData#" value="210000">辽宁省</a></li><li><a href="http://login.2345.com/member/editData#" value="220000">吉林省</a></li><li><a href="http://login.2345.com/member/editData#" value="230000">黑龙江省</a></li><li><a href="http://login.2345.com/member/editData#" value="310000">上海</a></li><li><a href="http://login.2345.com/member/editData#" value="320000">江苏省</a></li><li><a href="http://login.2345.com/member/editData#" value="330000">浙江省</a></li><li><a href="http://login.2345.com/member/editData#" value="340000">安徽省</a></li><li><a href="http://login.2345.com/member/editData#" value="350000">福建省</a></li><li><a href="http://login.2345.com/member/editData#" value="360000">江西省</a></li><li><a href="http://login.2345.com/member/editData#" value="370000">山东省</a></li><li><a href="http://login.2345.com/member/editData#" value="410000">河南省</a></li><li><a href="http://login.2345.com/member/editData#" value="420000">湖北省</a></li><li><a href="http://login.2345.com/member/editData#" value="430000">湖南省</a></li><li><a href="http://login.2345.com/member/editData#" value="440000">广东省</a></li><li><a href="http://login.2345.com/member/editData#" value="450000">广西壮族自治区</a></li><li><a href="http://login.2345.com/member/editData#" value="460000">海南省</a></li><li><a href="http://login.2345.com/member/editData#" value="500000">重庆</a></li><li><a href="http://login.2345.com/member/editData#" value="510000">四川省</a></li><li><a href="http://login.2345.com/member/editData#" value="520000">贵州省</a></li><li><a href="http://login.2345.com/member/editData#" value="530000">云南省</a></li><li><a href="http://login.2345.com/member/editData#" value="540000">西藏自治区</a></li><li><a href="http://login.2345.com/member/editData#" value="610000">陕西省</a></li><li><a href="http://login.2345.com/member/editData#" value="620000">甘肃省</a></li><li><a href="http://login.2345.com/member/editData#" value="630000">青海省</a></li><li><a href="http://login.2345.com/member/editData#" value="640000">宁夏回族自治区</a></li><li><a href="http://login.2345.com/member/editData#" value="650000">新疆维吾尔自治区</a></li><li><a href="http://login.2345.com/member/editData#" value="710000">台湾省</a></li><li><a href="http://login.2345.com/member/editData#" value="810000">香港特别行政区</a></li><li><a href="http://login.2345.com/member/editData#" value="820000">澳门特别行政区</a></li><li><a href="http://login.2345.com/member/editData#" value="990000">海外</a></li></ul>
                        </div>
                    </div>
                    <div class="m-selectA" id="mcm">
                        <input type="hidden" name="area2" value="100100">

                        <div class="text">市</div>
                        <div class="holder"><i class="arrow-btm"></i></div>
                        <div style="display:none" class="option">
                            <ul><li><a href="http://login.2345.com/member/editData#" value="100100">市</a></li></ul>
                        </div>
                    </div>
                    <div class="m-selectA" id="mcn">
                        <input type="hidden" name="area3" value="100101">

                        <div class="text">区县</div>
                        <div class="holder"><i class="arrow-btm"></i></div>
                        <div style="display:none" class="option">
                            <ul><li><a href="http://login.2345.com/member/editData#" value="100101">区县</a></li></ul>
                        </div>
                    </div>
                </div>
                <div class="form-item">
                    <a href="http://login.2345.com/member/editData#" onclick="submitForm();" class="btn-blueA">保存</a>
                </div>
            </div>
        </div>
    </div>
    <!--account_right end-->
</div><!--main end-->
@endsection