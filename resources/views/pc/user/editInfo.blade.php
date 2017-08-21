@extends('pc.layouts.user')
@section('title', '基本资料')
@section('head')
    <script src="https://cdn.bootcss.com/lodash.js/4.17.4/lodash.min.js"></script>
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
                        <el-input class="ipt_txt" v-model="real_name" placeholder=""></el-input>
                    </div>
                    <div class="form-item">
                        <span class="form-field ft-bold">QQ：</span>
                        <el-input class="ipt_txt" v-model="qq" placeholder=""></el-input>
                    </div>
                    <div class="form-item form-item-radio">
                        <span class="form-field ft-bold">性别：</span>
                        <el-radio-group v-model="real_sex">
                            <el-radio :label="1">男</el-radio>
                            <el-radio :label="2">女</el-radio>
                            <el-radio :label="0">保密</el-radio>
                        </el-radio-group>
                    </div>
                    <div class="form-item" style="z-index: 10">
                        <span class="form-field ft-bold">生日：</span>
                        <el-date-picker v-model="real_birthday" type="date" placeholder="选择日期"></el-date-picker>
                    </div>
                    <div class="form-item" style="z-index: 9">
                        <span class="form-field ft-bold">地区：</span>
                        <el-select v-model="area_selector_selected_prov" placeholder="请选择">
                            <el-option v-for="(prov, key) in area_selector_provs" :key="key" :label="key" :value="key">
                                @{{ key }}
                            </el-option>
                        </el-select>

                        <el-select v-model="area_selector_selected_city" placeholder="请选择">
                            <el-option v-for="(city, key) in area_selector_cities" :key="key" :label="key" :value="key">
                                @{{ key }}
                            </el-option>
                        </el-select>

                        <el-select v-model="area_selector_selected_district" placeholder="请选择">
                            <el-option v-for="(district, key) in area_selector_districts" :key="key" :label="district" :value="district">
                                @{{ district }}
                            </el-option>
                        </el-select>
                        <p>@{{ area_selector_selected_prov }} @{{ area_selector_selected_city }} @{{ area_selector_selected_district }}</p>
                    </div>
                    <div class="form-item">
                        <el-button type="primary">保存</el-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script src="{{ asset('/pc/user/area_selector_data.js') }}"></script>
<script>
    var vm = new Vue({
        el: '#app',
        data: {
            real_name: '',
            real_sex: 0,
            real_birthday: '',
            real_area: '',
            qq: '',

            area_selector_data: area_selector_data,
            area_selector_init_prov: '北京市',
            area_selector_init_city: '市辖区',
            area_selector_init_district: '东城区',
            area_selector_selected_prov: '',
            area_selector_selected_city: '',
            area_selector_selected_district: ''
        },
        computed: {
            area_selector_provs: function(){
                var provs = this.area_selector_data;
                if (provs){
                    this.area_selector_selected_prov = _.keys(provs)[0];
                    return provs;
                } else {
                    return {};
                }
            },
            area_selector_cities: function(){
                var cities = this.area_selector_provs[this.area_selector_selected_prov];
                if (cities){
                    this.area_selector_selected_city = _.keys(cities)[0];
                    return cities;
                } else {
                    return {};
                }
            },
            area_selector_districts: function(){
                var districts = this.area_selector_cities[this.area_selector_selected_city];
                if (districts) {
                    this.area_selector_selected_district = districts[0];
                    return districts;
                } else {
                    return [];
                }
            }
        },
        methods: {
            areaSelectorSet: function (prov, city, district) {
                var _this = this;

                var asyncJob = [
                    function () {
                        if (_.has(_this.area_selector_provs, prov))
                            _this.area_selector_selected_prov = prov;
                    },
                    function () {
                        if (_.has(_this.area_selector_cities, city))
                            _this.area_selector_selected_city = city;
                    },
                    function () {
                        if (_.includes(_this.area_selector_districts, district))
                            _this.area_selector_selected_district = district;
                    }
                ].reduceRight(function (left, right) {
                    return function () {
                        right(setTimeout(left, 0))
                    };
                });

                asyncJob();
            }
        },
        ready: function(){
            this.areaSelectorSet(
                this.area_selector_init_prov,
                this.area_selector_init_city,
                this.area_selector_init_district
            );
        }
    })
</script>
@endsection