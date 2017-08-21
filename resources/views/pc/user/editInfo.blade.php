@extends('pc.layouts.user')
@section('title', '基本资料')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/useraccount.css">
@endsection

@section('content')
    @include('pc.user._nav', ['navpos'=>'two'])
    <div class="main main_position clearfix">
        @include('pc.user._leftBar')
        <div class="account_right">
            <h2 class="pf">基本资料</h2>
            {{--<p v-cloak>@{{ test }}</p>--}}

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

                            <div class="text">年</div>
                            <div class="holder"><i class="arrow-btm"></i></div>
                            <div class="option" style="display:none">
                                <ul>
                                </ul>
                            </div>
                        </div>
                        <div class="m-selectA" id="month">
                            <input type="hidden" name="month" value="00">

                            <div class="text">月</div>
                            <div class="holder"><i class="arrow-btm"></i></div>
                            <div class="option" style="display:none">
                                <ul></ul>
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
                        <a href="" class="btn-blueA">保存</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script>
    var vm = new Vue({
        el: '#app',
        data: {
            test: 'xxx'
        }
    })
</script>
@endsection