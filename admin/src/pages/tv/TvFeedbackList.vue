<template>
  <div>
    <!-- 栏目Title -->
    <console-title title="影视异常反馈" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <Button @click="loadData"><Icon type="loop" class="font14" /></Button>
      </div>
    </console-title>

    <!-- 数据表与分页 -->
    <el-table border fit :data="dataList" v-loading="isLoading" element-loading-text="拼命加载中" @selection-change="handleSelectionChange">
      <el-table-column type="selection" width="45"></el-table-column>
      <el-table-column prop="tv_name" label="影视名称"></el-table-column>
      <el-table-column prop="username" label="反馈用户"></el-table-column>
      <el-table-column label="异常类型">
        <template scope="scope">
          {{ replaceType(scope.row.type) }}
        </template>
      </el-table-column>
      <el-table-column label="是否处理">
        <template scope="scope">{{ '未处理' }}</template>
      </el-table-column>
      <el-table-column fixed="right" label="操作" width="170">
        <template scope="scope">
          <Button size="small" type="success" @click="handleFeedback(scope.row, scope.$index, dataList)">已处理</Button>
          <Button size="small" type="error" @click="deleteFeedback(scope.row, scope.$index, dataList)">删除</Button>
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
  import { tvFeedbackList, tvFeedbackDestory, tvFeedbackHandle } from '../../api/tv'
  import consoleTitle from '../../components/ConsoleTitle'

  export default {
    name: 'feedbackList',
    data: function () {
      return {
      }
    },
    components: {
      consoleTitle
    },
    methods: {
      loadData: function () {
        this.isLoading = true

        this.axios({
          method: 'GET',
          url: tvFeedbackList
        }).then(response => {
          this.isLoading = false
          this.dataList = response.data.data
        })
      },
      deleteFeedback: function (row) {
        this.$Modal.confirm({
          title: '确认删除',
          content: '确认彻底删除该反馈么？',
          loading: true,
          scrollable: false,
          onOk: function () {
            this.axios({
              url: tvFeedbackDestory + row.fb_id,
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
      },
      handleFeedback: function (row) {
        this.$Modal.confirm({
          title: '确认完成',
          content: '确认已经解决该资源异常的反馈了么？',
          loading: true,
          scrollable: false,
          onOk: function () {
            this.axios({
              url: tvFeedbackHandle + row.fb_id,
              method: 'POST'
            }).then(response => {
              this.$Modal.remove()
              if (response.data.code === 0) {
                this.$Notice.success({
                  title: '操作成功'
                })

                window.setTimeout(function () {
                  window.location.reload()
                }, 1300)
              } else {
                this.$Notice.error({
                  title: '操作失败',
                  desc: '操作失败，失败原因：' + response.data.msg
                })
              }
            })
          }
        })
      },
      replaceType: function (type) {
        if (type === 0) {
          return '百度云'
        } else if (type === 1) {
          return '在线播放'
        } else if (type === 2) {
          return '下载中心'
        }
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
