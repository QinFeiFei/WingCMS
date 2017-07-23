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
        <router-link :to="{name:'UserCreate'}"><Button type="primary">添加会员</Button></router-link>
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
      <el-table-column prop="username" label="用户名"></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'email')" label="邮箱">
        <template scope="scope">
          {{ scope.row.email }}
          <Icon type="android-checkmark-circle" v-if="scope.row.email_check === '1'"></Icon>
        </template>
      </el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'phone')" label="手机号">
        <template scope="scope">
          {{ scope.row.phone }}
          <Icon type="android-checkmark-circle" v-if="scope.row.phone_check === '1'"></Icon>
        </template>
      </el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'login_num')" prop="login_num" label="登陆次数" sortable></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'register_type')" prop="register_type" label="注册来源" :formatter="RegisterTypeText"></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'last_login')" prop="last_login" label="最后登陆时间" sortable></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'last_ip')" prop="last_ip" label="最后登陆IP"></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'created_at')" prop="created_at" label="注册时间" sortable></el-table-column>
      <el-table-column fixed="right" label="操作" width="170">
        <template scope="scope">
          <Button size="small" type="info">查看</Button>
          <Button size="small" type="success">编辑</Button>
          <Button size="small" type="error" @click="deleteUser(scope.row, scope.$index, dataList)">删除</Button>
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
  import { userList, destoryUser } from '../../api/user'
  import registerType from '../../config/userRegisterType'
  import consoleTitle from '../../components/ConsoleTitle'
  import columnSearch from '../../components/ColumnSearch'
  import setColumnModal from '../../components/SetColumnsShow'

  export default {
    name: 'userList',
    data: function () {
      return {
        checked: true,
        registerType: registerType,
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
            column: 'email',
            text: '邮箱',
            show: true
          }, {
            column: 'phone',
            text: '手机号',
            show: true
          }, {
            column: 'login_num',
            text: '登陆次数',
            show: false
          }, {
            column: 'register_type',
            text: '注册来源',
            show: false
          }, {
            column: 'last_login',
            text: '最后登陆时间',
            show: true
          }, {
            column: 'last_ip',
            text: '最后登陆IP',
            show: false
          }, {
            column: 'created_at',
            text: '注册时间',
            show: false
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
        return this.parseRegisterTypeText(row.register_type)
      },
      // 将会员放入回收站
      deleteUser: function (row, index, rows) {
        this.$Modal.confirm({
          title: '确认删除',
          content: '确认将该会员 <b style="color:red">' + row.username + '</b> 放入回收站么？',
          loading: true,
          scrollable: false,
          onOk: function () {
            this.axios({
              url: destoryUser + row.user_id,
              method: 'DELETE'
            }).then(response => {
              this.$Modal.remove()
              if (response.data.code === 0) {
                this.$Notice.success({
                  title: '成功将会员 <span style="color:red">' + row.username + '</span> 放入回收站'
                })

                rows.splice(index, 1)
                if (rows.length === 0) {
                  window.location.reload()
                }
              } else {
                this.$Notice.error({
                  title: '删除失败',
                  desc: '《' + row.tv_name + '》删除失败，失败原因：' + response.data.msg
                })
              }
            })
          }
        })
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
  .el-checkbox__input.is-checked .el-checkbox__inner {
    background-color: #20a0ff !important;
  }
</style>
