<template>
  <div>
    <!-- 栏目Notice提醒 -->
    <Alert banner closable type="warning">通知：通知内容。。。</Alert>

    <!-- 栏目Title -->
    <console-title title="影视分类标签" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <Button @click="loadData"><Icon type="loop" class="font14" /></Button>
        <router-link :to="{name:'TvClassCreate'}"><Button type="primary">添加分类标签</Button></router-link>
      </div>
    </console-title>

    <!-- 栏目Search -->
    <column-search :searchFields="searchFields" :advancedSearch="false" @submit="search">
      <template slot="toolBar">
        <Tooltip content="导出数据" placement="bottom">
          <span class="aliBtn aliBtn-default"><Icon type="android-download"></Icon></span>
        </Tooltip>
        <Tooltip content="帮助信息" placement="bottom">
          <span class="aliBtn aliBtn-default"><Icon type="help"></Icon></span>
        </Tooltip>
      </template>
    </column-search>

    <!-- 数据表与分页 -->
    <el-table border fit :data="dataList" v-loading="isLoading" element-loading-text="拼命加载中" @selection-change="handleSelectionChange">
      <el-table-column type="selection" width="45"></el-table-column>
      <el-table-column prop="tv_class_name" label="分类标签名称"></el-table-column>
      <el-table-column label="影视类型">
        <template scope="scope">
          {{ parseTvTypeText(scope.row.tv_type) }}
        </template>
      </el-table-column>
      <el-table-column fixed="right" label="操作" width="170">
        <template scope="scope">
          <router-link :to="{ name:'TvClassUpdate', params:{tv_class_id:scope.row.tv_class_id} }"><Button size="small" type="success">编辑</Button></router-link>
          <Button size="small" type="error" @click="deleteTvClass(scope.row, scope.$index, dataList)">删除</Button>
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
  import { tvClassList, tvClassDestory } from '../../api/tv'
  import consoleTitle from '../../components/ConsoleTitle'
  import columnSearch from '../../components/ColumnSearch'
  import types from '../../config/TvTypes'

  export default {
    name: 'mvList',
    data: function () {
      return {
        searchFields: [
          { field: 'tv_type', text: '影视类型', type: 'select', values: types, placeholder: '请选择影视类型', search: null }
        ]
      }
    },
    components: {
      consoleTitle,
      columnSearch
    },
    methods: {
      loadData: function () {
        this.isLoading = true
        let searchParams = this.parseParam(this.searchFields)

        this.axios({
          method: 'GET',
          url: tvClassList,
          params: searchParams
        }).then(response => {
          this.isLoading = false
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
      deleteTvClass: function (row) {
        this.$Modal.confirm({
          title: '确认删除',
          content: '确认将影视分类标签<b style="color:red">《' + row.tv_class_name + '》</b>彻底删除么？',
          loading: true,
          scrollable: false,
          onOk: function () {
            this.axios({
              url: tvClassDestory + row.tv_class_id,
              method: 'DELETE'
            }).then(response => {
              this.$Modal.remove()
              if (response.data.code === 0) {
                this.$Notice.success({
                  title: '分类标签《' + row.tv_class_name + '》 删除成功'
                })

                window.setTimeout(function () {
                  window.location.reload()
                }, 1300)
              } else {
                this.$Notice.error({
                  title: '删除失败',
                  desc: '分类标签《' + row.tv_class_name + '》删除失败，失败原因：' + response.data.msg
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
</style>
