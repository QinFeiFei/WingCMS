<template>
  <div>
    <!-- 栏目Title -->
    <console-title title="求资源" class="console-title-border">
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
      <el-table-column prop="username" label="反馈会员"></el-table-column>
      <el-table-column label="是否处理">
        <template scope="scope">
          <!--{{ scope.row.is_handle }}-->
          {{ '未处理' }}
        </template>
      </el-table-column>
      <el-table-column fixed="right" label="操作" width="170">
        <template scope="scope">
          <Button size="small" type="success" @click="handleSeek(scope.row, scope.$index, dataList)">已添加</Button>
          <Button size="small" type="error" @click="deleteSeek(scope.row, scope.$index, dataList)">删除</Button>
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
  import { tvSeekList, tvSeekDestory, tvSeekHandle } from '../../api/tv'
  import consoleTitle from '../../components/ConsoleTitle'

  export default {
    name: 'seekList',
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
          url: tvSeekList
        }).then(response => {
          this.isLoading = false
          this.dataList = response.data.data
        })
      },
      deleteSeek: function (row) {
        this.$Modal.confirm({
          title: '确认删除',
          content: '确认彻底删除该用户寻求的资源么？',
          loading: true,
          scrollable: false,
          onOk: function () {
            this.axios({
              url: tvSeekDestory + row.sk_id,
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
      handleSeek: function (row) {
        this.$Modal.confirm({
          title: '确认处理',
          content: '确认已经上线该用户寻求的资源了么？',
          loading: true,
          scrollable: false,
          onOk: function () {
            this.axios({
              url: tvSeekHandle + row.sk_id,
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
                  title: '操作成功',
                  desc: '操作失败，失败原因：' + response.data.msg
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
