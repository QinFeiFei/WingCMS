<template>
  <div>
    <!-- 栏目Notice提醒 -->
    <Alert banner closable type="warning">通知：通知内容。。。</Alert>

    <!-- 栏目Title -->
    <console-title title="所有会员" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <Button @click="loadData"><Icon type="loop" class="font14" /></Button>
        <router-link :to="{name:'dashBoard'}"><Button type="primary">添加会员</Button></router-link>
      </div>
    </console-title>

    <!-- 栏目Search -->
    <column-search :searchFields="searchFields" :advancedSearch="true" @submit="search">
      <template slot="toolBar">
        <Tooltip content="导出数据" placement="bottom">
          <span class="aliBtn aliBtn-default"><Icon type="android-download"></Icon></span>
        </Tooltip>
        <Tooltip content="设置显示的列" placement="bottom">
          <span class="aliBtn aliBtn-default" @click="showTableColumns"><Icon type="ios-gear"></Icon></span>
        </Tooltip>
        <Tooltip content="帮助信息" placement="bottom">
          <span class="aliBtn aliBtn-default"><Icon type="help"></Icon></span>
        </Tooltip>
      </template>
    </column-search>
    <set-column-modal :columnShow="showColumns" @set="setShowTableColumns"></set-column-modal>

    <!-- 数据表与分页 -->
    <el-table border fit :data="dataList" v-loading="isLoading" element-loading-text="拼命加载中" @selection-change="handleSelectionChange">
      <el-table-column type="selection" width="45"></el-table-column>
      <el-table-column prop="tv_name" label="用户名"></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_show_year')" prop="tv_show_year" label="邮箱"></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_show_year')" prop="tv_show_year" label="手机号"></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_show_year')" prop="tv_show_year" label="登陆次数" sortable></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_show_year')" label="注册来源" :formatter="RegisterTypeText"></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_show_year')" prop="tv_show_year" label="最后登陆时间" sortable></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_show_year')" prop="tv_show_year" label="最后登陆IP"></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'created_at')" prop="created_at" label="添加时间" sortable></el-table-column>
      <el-table-column fixed="right" label="操作" width="170">
        <template scope="scope">
          <Button size="small" type="info">查看</Button>
          <router-link :to="{ name:'TvUpdate', params:{tv_id:scope.row.user_id} }"><Button size="small" type="success">编辑</Button></router-link>
          <Button size="small" type="error" @click="deleteTv(scope.row, scope.$index, dataList)">删除</Button>
        </template>
      </el-table-column>
    </el-table>

    <div class="pageWrap">
      <Button-group class="fleft">
        <Button type="ghost" icon="ios-color-wand-outline"></Button>
        <Button type="ghost" icon="ios-sunny-outline"></Button>
        <Button type="ghost" icon="ios-crop"></Button>
        <Button type="ghost" icon="ios-color-filter-outline"></Button>
      </Button-group>

      <Page class="inline-block fright" :total="list_count" :page-size="page_size" show-total show-sizer @on-change="changePage" @on-page-size-change="changePageSize"></Page>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
  import { userList } from '../../api/user'
  import registerType from '../../config/userRegisterType'
  import consoleTitle from '../../components/ConsoleTitle'
  import columnSearch from '../../components/ColumnSearch'
  import setColumnModal from '../../components/SetColumnsShow'

  export default {
    name: 'userList',
    data: function () {
      return {
        searchFields: [
          { field: 'username', text: '用户名', type: 'text', placeholder: '请输入要搜索的用户名', search: null },
          { field: 'phone', text: '手机号', type: 'text', placeholder: '请输入要搜索的手机号', search: null },
          { field: 'email', text: '邮箱', type: 'text', placeholder: '请输入要搜索的邮箱', search: null },
          { field: 'register_type', text: '注册来源', type: 'select', values: registerType, placeholder: '请选择用户来源', search: null },
          { field: 'last_login', text: '最后登陆时间', type: 'time', placeholder: '请选择最后登陆时间范围', search: null },
          { field: 'created_at', text: '添加时间', type: 'time', placeholder: '请选择注册时间范围', search: null }
        ],
        showColumns: [
          {
            column: 'tv_show_year',
            text: '用户名',
            show: true
          }, {
            column: 'tv_lang',
            text: '语言',
            show: true
          }, {
            column: 'tv_area',
            text: '地区',
            show: false
          }, {
            column: 'tv_minute',
            text: '片长',
            show: false
          }, {
            column: 'tv_baidu_url',
            text: '百度分享URL',
            show: true
          }, {
            column: 'tv_baidu_pwd',
            text: '百度分享密码',
            show: true
          }, {
            column: 'created_at',
            text: '添加时间',
            show: true
          }, {
            column: 'updated_at',
            text: '最后修改时间',
            show: true
          }
        ]
      }
    },
    components: {
      consoleTitle,
      columnSearch,
      setColumnModal
    },
    methods: {
      loadData: function () {
        this.isLoading = true
        let searchParams = this.parseParam(this.searchFields)

        this.axios({
          method: 'GET',
          url: userList,
          params: searchParams
        }).then(response => {
          this.isLoading = false
          this.list_count = response.data.total
          this.dataList = response.data.data
        })
      },
      readNotice: function () {
        // console.log('关闭了notice.')
      },
      search: function (obj) {
        this.loadData()
      },
      setShowTableColumns: function (showTableColumns) {
        // console.log('显示了这些列：' + showTableColumns)
      },
      RegisterTypeText: function (row, column) {
        return row.address
      }
    },
    created: function () {
      this.loadData()
    },
    watch: {
    }
  }
</script>

<style scoped>
</style>
