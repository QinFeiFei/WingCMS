@extends('pc.layouts.user')
@section('title', '基本资料')
@section('head')
    <script src="//cdn.bootcss.com/lodash.js/4.17.4/lodash.min.js"></script>
    <script src="//cdn.bootcss.com/axios/0.16.2/axios.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/useraccount.css">
    <style>
        .el-breadcrumb:after, .el-breadcrumb:before, .el-button-group:after, .el-button-group:before, .el-form-item:after, .el-form-item:before, .el-form-item__content:after, .el-form-item__content:before {
            display: none;
        }
    </style>
@endsection

@section('content')
    @include('pc.user._nav', ['navpos'=>'two'])
    <div class="main main_position clearfix">
        @include('pc.user._leftBar')
        <div class="account_right">
            <h2 class="pf">基本资料</h2>

            <div class="m-boxB-bd">
                <el-form :model="forms" :rules="rules" ref="forms" label-position="right" label-width="90px">
                    <el-form-item label="真实姓名：">
                        <el-input v-cloak class="ipt_txt" v-model="forms.real_name" placeholder=""></el-input>
                    </el-form-item>
                    <el-form-item label="QQ：" prop="qq">
                        <el-input v-cloak class="ipt_txt" v-model.number="forms.qq" placeholder=""></el-input>
                    </el-form-item>
                    <el-form-item label="性别：">
                        <el-radio-group v-cloak v-model="forms.real_sex">
                            <el-radio :label="1">男</el-radio>
                            <el-radio :label="2">女</el-radio>
                            <el-radio :label="0">保密</el-radio>
                        </el-radio-group>
                    </el-form-item>
                    <el-form-item label="生日：">
                        <el-date-picker v-cloak v-model="forms.real_birthday" type="date" placeholder="选择日期"></el-date-picker>
                    </el-form-item>
                    <el-form-item label="地区：">
                        <el-select v-cloak v-model="area_selector_selected_prov" placeholder="请选择" class="w120">
                            <el-option v-for="(prov, key) in area_selector_provs" :key="key" :label="key" :value="key">
                                @{{ key }}
                            </el-option>
                        </el-select>

                        <el-select v-cloak v-model="area_selector_selected_city" placeholder="请选择" class="w120">
                            <el-option v-for="(city, key) in area_selector_cities" :key="key" :label="key" :value="key">
                                @{{ key }}
                            </el-option>
                        </el-select>

                        <el-select v-cloak v-model="area_selector_selected_district" placeholder="请选择" class="w120">
                            <el-option v-for="(district, key) in area_selector_districts" :key="key" :label="district" :value="district">
                                @{{ district }}
                            </el-option>
                        </el-select>
                    </el-form-item>
                    <div class="form-item">
                        <el-button v-cloak @click="save()" v-loading="loading" type="primary">保存</el-button>
                    </div>
                </el-form>
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
            forms: {
                real_name: '{{ $user->real_name }}',
                real_sex: {{ $user->real_sex }},
                real_birthday: '{{ $user->real_birthday }}',
                qq: '{{ $user->qq }}'
            },
            rules: {
                qq: [
                    { type: 'integer', message: 'QQ号格式错误', trigger: 'blur' }
                ]
            },
            loading: false,

            <?php $area = explode(' ', $user->real_area); ?>
            area_selector_data: area_selector_data,
            area_selector_init_prov: '广东省',
            area_selector_init_city: '深圳市',
            area_selector_init_district: '龙岗区',
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
            },
            save: function (){
                var curPage = this
                this.loading = true
                var data = {
                    real_name: this.forms.real_name,
                    real_sex: this.forms.real_sex,
                    real_birthday: this.forms.real_birthday,
                    qq: this.forms.qq,
                    real_area: this.area_selector_selected_prov + ' ' + this.area_selector_selected_city + ' ' + this.area_selector_selected_district
                }
                axios({
                    method: 'post',
                    url: '{{ route('pc::userEditInfo') }}',
                    data: data
                }).then(function(response) {
                    curPage.loading = false

                    if(response.data.code == 0){
                        curPage.$message({
                            message: response.data.msg,
                            type: 'success'
                        });
                    }else{
                        curPage.$message.error(response.data.msg)
                    }

                    window.setTimeout(function(){
                        window.location.reload()
                    },1500)
                });
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