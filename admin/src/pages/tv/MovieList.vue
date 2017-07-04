<template>
  <div>
    <!-- 栏目Notice提醒 -->
    <Alert banner closable type="warning">通知：通知内容。。。</Alert>

    <!-- 栏目Title -->
    <console-title title="电影列表" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <Button><Icon type="loop" style="font-size:14px;" /></Button>
        <Button type="primary">Primary</Button>
      </div>
    </console-title>

    <!-- 栏目Search -->
    <column-search :searchFields="searchFields" :advancedSearch="true" @submit="search">
      <template slot="toolBar">
        <span class="aliBtn aliBtn-default"><Icon type="android-download"></Icon></span>
        <span class="aliBtn aliBtn-default"><Icon type="ios-gear"></Icon></span>
        <span class="aliBtn aliBtn-default"><Icon type="help"></Icon></span>
      </template>
    </column-search>

    <div style="position:relative;width:877px;height:311px;">
      <el-table border
        :data="tableData"
        style="width: 100%">
        <el-table-column
          prop="date"
          label="日期"
          width="180">
        </el-table-column>
        <el-table-column
          prop="name"
          label="姓名"
          width="180">
        </el-table-column>
        <el-table-column
          prop="address"
          label="地址">
        </el-table-column>
      </el-table>
      <Spin size="large" fix v-if="spinShow"></Spin>
    </div>

    <Page :total="100" show-sizer @on-change="changePage" @on-page-size-change="changePage"></Page>
  </div>
</template>

<script>
  import consoleTitle from '../../components/ConsoleTitle'
  import columnSearch from '../../components/ColumnSearch'
  import langs from '../../config/TvLangs'
  import areas from '../../config/TvAreas'

  export default {
    data: function () {
      return {
        spinShow: true,
        simpleSearch: {
          field: '',
          search: null
        },
        searchFields: [
          { field: 'tv_name', text: '影视名称', type: 'text', placeholder: '请输入要搜索的名称', search: null },
          { field: 'tv_lang', text: '影视语言', type: 'select', values: langs, placeholder: '请选择语言', search: null },
          { field: 'tv_area', text: '影视地区', type: 'select', values: areas, placeholder: '请选地区', search: null },
          { field: 'created_at', text: '添加时间', type: 'time', placeholder: '请选择添加时间范围', search: null }
        ],
        tableData: [{
          date: '2016-05-02',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄'
        }, {
          date: '2016-05-04',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1517 弄'
        }, {
          date: '2016-05-01',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1519 弄'
        }, {
          date: '2016-05-03',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1516 弄'
        }]
      }
    },
    components: {
      consoleTitle,
      columnSearch
    },
    methods: {
      readNotice: function () {
        console.log('关闭了notice.')
      },
      search: function (obj) {
        console.log(obj)
      },
      changePage: function (page) {
        console.log(page)
      },
      changePageSize: function (pageSize) {
        console.log(pageSize)
      }
    },
    created: function () {
    }
  }
</script>
