<template>
  <div>
    <!-- 栏目Notice提醒 -->
    <Alert banner closable type="warning">通知：通知内容。。。</Alert>

    <!-- 栏目Title -->
    <console-title title="电影列表" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <Button><Icon type="loop" class="font14" /></Button>
        <router-link :to="{name:'TvCreate'}"><Button type="primary">添加电影</Button></router-link>
      </div>
    </console-title>

    <!-- 栏目Search -->
    <column-search :searchFields="searchFields" :advancedSearch="true" @submit="search">
      <template slot="toolBar">
        <Tooltip content="导出数据" placement="top">
          <span class="aliBtn aliBtn-default"><Icon type="android-download"></Icon></span>
        </Tooltip>
        <Tooltip content="设置显示的列" placement="top">
          <span class="aliBtn aliBtn-default" @click="showTableColumns"><Icon type="ios-gear"></Icon></span>
        </Tooltip>
        <Tooltip content="帮助信息" placement="top">
          <span class="aliBtn aliBtn-default"><Icon type="help"></Icon></span>
        </Tooltip>



      </template>
    </column-search>
    <set-column-modal :columnShow="showColumns" @set="setShowTableColumns"></set-column-modal>

    <!-- 数据表与分页 -->
    <el-table border :data="tableData" v-loading="isLoading" element-loading-text="拼命加载中" @selection-change="handleSelectionChange">
      <el-table-column type="selection" width="45"></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'date')" prop="date" label="日期" sortable></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'name')" prop="name" label="姓名"></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'address')" prop="address" label="地址"></el-table-column>
      <el-table-column fixed="right" label="操作" width="170">
        <template scope="scope">
          <Button size="small" type="info">查看</Button>
          <Button size="small" type="success">编辑</Button>
          <Button size="small" type="error">删除</Button>
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

      <Page class="inline-block fright" :total="100" show-sizer @on-change="changePage" @on-page-size-change="changePage"></Page>
    </div>

  </div>
</template>

<script>
  import consoleTitle from '../../components/ConsoleTitle'
  import columnSearch from '../../components/ColumnSearch'
  import setColumnModal from '../../components/SetColumnsShow'
  import langs from '../../config/TvLangs'
  import areas from '../../config/TvAreas'

  export default {
    data: function () {
      return {
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
        tableData: [
          {
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
          }
        ],
        showColumns: [
          {
            column: 'date',
            text: '日期',
            show: true
          }, {
            column: 'name',
            text: '姓名',
            show: true
          }, {
            column: 'address',
            text: '地址',
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
      },
      showTableColumns: function () {
        this.$store.commit('ToggleColumnsShow')
      },
      setShowTableColumns: function (showTableColumns) {
        console.log(showTableColumns)
      }
    },
    created: function () {
    },
    watch: {
    }
  }
</script>
