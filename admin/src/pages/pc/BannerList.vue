<template>
  <div>
    <!-- 栏目Notice提醒 -->
    <Alert banner closable type="warning">通知：通知内容。。。</Alert>

    <!-- 栏目Title -->
    <console-title title="Banner列表" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <Button @click="loadData"><Icon type="loop" class="font14" /></Button>
        <router-link :to="{name:'bannerCreate'}"><Button type="primary">添加Banner</Button></router-link>
      </div>
    </console-title>

    <!-- 数据表与分页 -->
    <el-table border fit :data="dataList" v-loading="isLoading" element-loading-text="拼命加载中" @selection-change="handleSelectionChange">
      <el-table-column type="selection" width="45"></el-table-column>
      <el-table-column prop="banner_title" label="标题"></el-table-column>
      <el-table-column prop="banner_sort" label="排序" sortable></el-table-column>
      <el-table-column prop="banner_url" label="链接URL"></el-table-column>
      <el-table-column label="背景颜色">
        <template scope="scope">
          <span :style="'display:block;float:left;margin-right:5px;width:20px;height:20px;background:' + scope.row.banner_bgcolor"></span>
          {{ scope.row.banner_bgcolor }}
        </template>
      </el-table-column>
      <el-table-column fixed="right" label="操作" width="170">
        <template scope="scope">
          <router-link :to="{ name:'bannerUpdate', params:{banner_id:scope.row.banner_id} }"><Button size="small" type="success">编辑</Button></router-link>
          <Button size="small" type="error" @click="deleteBanner(scope.row)">删除</Button>
        </template>
      </el-table-column>
    </el-table>

    <div class="pageWrap">
      <Page class="inline-block fright" :total="list_count" :page-size="page_size" show-total show-sizer @on-change="changePage" @on-page-size-change="changePageSize"></Page>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
  import { bannerList, bannerDestory } from '../../api/pc'
  import consoleTitle from '../../components/ConsoleTitle'

  export default {
    name: 'bannerList',
    data: function () {
      return {
        searchFields: []
      }
    },
    components: {
      consoleTitle
    },
    methods: {
      loadData: function () {
        this.isLoading = true
        let searchParams = this.parseParam(this.searchFields)
        this.axios({
          method: 'GET',
          url: bannerList,
          params: searchParams
        }).then(response => {
          this.isLoading = false
          this.list_count = response.data.total
          this.dataList = response.data.data
        })
      },
      deleteBanner: function (row) {
        this.$Modal.confirm({
          title: '确认删除',
          content: '确认将该Banner彻底删除么？',
          loading: true,
          scrollable: false,
          onOk: function () {
            this.axios({
              url: bannerDestory + row.banner_id,
              method: 'DELETE'
            }).then(response => {
              this.$Modal.remove()
              if (response.data.code === 0) {
                this.$Notice.success({
                  title: '删除成功'
                })

                window.setTimeout(function () {
                  window.location.reload()
                }, 1300)
              } else {
                this.$Notice.error({
                  title: '删除失败',
                  desc: '删除失败，失败原因：' + response.data.msg
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
