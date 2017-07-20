<template>
  <div>
    <!-- 栏目Notice提醒 -->
    <Alert banner closable type="warning">通知：通知内容。。。</Alert>

    <!-- 栏目Title -->
    <console-title title="公开课列表" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <Button @click="loadData"><Icon type="loop" class="font14" /></Button>
        <router-link :to="{name:'TvCreate', params:{type:openclass.text }}"><Button type="primary">添加公开课</Button></router-link>
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
      <el-table-column prop="tv_name" label="影视名称"></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_show_year')" prop="tv_show_year" label="影视年代" sortable></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_lang')" label="语言">
        <template scope="scope">
          {{ parseTvLangText(scope.row.tv_lang) }}
        </template>
      </el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_area')" label="地区">
        <template scope="scope">
          {{ parseTvAreaText(scope.row.tv_area) }}
        </template>
      </el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_minute')" prop="tv_minute" label="片长" sortable></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_baidu_url')" label="百度分享URL">
        <template scope="scope">
          <Input v-show="scope.row.urlEdit" size="small" v-model="scope.row.tv_baidu_url" />
          <Button v-show="scope.row.urlEdit" class="editRowBtn" size="small" type="primary" icon="checkmark-round" @click="setUrl(scope.row)"></Button>

          <span v-show="!scope.row.urlEdit">{{ scope.row.tv_baidu_url }}</span>
          <Button v-show="!scope.row.urlEdit" class="editRowBtn" size="small" type="success" icon="edit" @click="scope.row.urlEdit = true"></Button>
        </template>
      </el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'tv_baidu_pwd')" label="百度分享密码">
        <template scope="scope">
          <Input v-if="scope.row.passEdit" size="small" v-model="scope.row.tv_baidu_pwd" />
          <Button v-if="scope.row.passEdit" class="editRowBtn" size="small"  type="primary" icon="checkmark-round" @click="setPass(scope.row)"></Button>

          <span v-if="!scope.row.passEdit">{{ scope.row.tv_baidu_pwd }}</span>
          <Button v-if="!scope.row.passEdit" class="editRowBtn" size="small" type="success" icon="edit" @click="scope.row.passEdit=true"></Button>
        </template>
      </el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'created_at')" prop="created_at" label="添加时间" sortable></el-table-column>
      <el-table-column v-if="displayColumns(showColumns, 'updated_at')" prop="updated_at" label="最后修改时间" sortable></el-table-column>
      <el-table-column fixed="right" label="操作" width="170">
        <template scope="scope">
          <Button size="small" type="info">查看</Button>
          <router-link :to="{ name:'TvUpdate', params:{tv_id:scope.row.tv_id} }"><Button size="small" type="success">编辑</Button></router-link>
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
  import { tvList } from '../../api/tv'
  import consoleTitle from '../../components/ConsoleTitle'
  import columnSearch from '../../components/ColumnSearch'
  import setColumnModal from '../../components/SetColumnsShow'
  import langs from '../../config/TvLangs'
  import areas from '../../config/TvAreas'

  export default {
    name: 'openclassList',
    data: function () {
      return {
        searchFields: [
          { field: 'tv_name', text: '影视名称', type: 'text', placeholder: '请输入要搜索的名称', search: null },
          { field: 'tv_lang', text: '影视语言', type: 'select', values: langs, placeholder: '请选择语言', search: null },
          { field: 'tv_area', text: '影视地区', type: 'select', values: areas, placeholder: '请选地区', search: null },
          { field: 'created_at', text: '添加时间', type: 'time', placeholder: '请选择添加时间范围', search: null }
        ],
        showColumns: [
          {
            column: 'tv_show_year',
            text: '影视年代',
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
        searchParams.tv_type = this.openclass.value

        this.axios({
          method: 'GET',
          url: tvList,
          params: searchParams
        }).then(response => {
          this.isLoading = false
          this.list_count = response.data.total
          this.dataList = response.data.data.map(item => {
            item.urlEdit = false
            item.passEdit = false
            return item
          })
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
