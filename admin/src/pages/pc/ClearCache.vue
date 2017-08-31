<template>
  <div>
    <!-- 栏目Title -->
    <console-title title="清除首页缓存" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <Button type="primary" @click="$router.back()"><Icon type="chevron-left"></Icon>　返回</Button>
      </div>
    </console-title>
    <div style="height:20px;"></div>
    <div>
      <div style="border-bottom: 1px solid #e9e9e9;padding-bottom:6px;margin-bottom:6px;">
        <Checkbox
          :indeterminate="indeterminate"
          :value="checkAll"
          @click.prevent.native="handleCheckAll">全选</Checkbox>
      </div>
      <Checkbox-group v-model="checkAllGroup" @on-change="checkAllGroupChange">
        <Checkbox label="电视剧[推荐]" style="width:150px;"></Checkbox>
        <Checkbox label="电视剧[最近更新]" style="width:150px;"></Checkbox><br />
        <Checkbox label="电影[推荐]" style="width:150px;"></Checkbox>
        <Checkbox label="电影[最近更新]" style="width:150px;"></Checkbox><br />
        <Checkbox label="动漫[推荐]" style="width:150px;"></Checkbox>
        <Checkbox label="动漫[最近更新]" style="width:150px;"></Checkbox><br />
        <Checkbox label="综艺[推荐]" style="width:150px;"></Checkbox>
        <Checkbox label="综艺[最近更新]" style="width:150px;"></Checkbox><br />
        <Checkbox label="其它影视[推荐]" style="width:150px;"></Checkbox>
        <Checkbox label="其它影视[最近更新]" style="width:150px;"></Checkbox><br />
        <Checkbox label="MV[推荐]" style="width:150px;"></Checkbox>
        <Checkbox label="MV[最近更新]" style="width:150px;"></Checkbox><br />
        <Checkbox label="其它影视[推荐]" style="width:150px;"></Checkbox>
        <Checkbox label="其它影视[最近更新]" style="width:150px;"></Checkbox><br />
      </Checkbox-group>

      <Button type="primary" style="margin-top: 10px;" @click="onclear">立即清除</Button>
    </div>
  </div>
</template>
<script type="text/ecmascript-6">
  import consoleTitle from '../../components/ConsoleTitle'
  import { clearCache } from '../../api/pc'

  export default {
    created: function () {
    },
    data: function () {
      return {
        indeterminate: false,
        checkAll: false,
        checkAllGroup: []
      }
    },
    components: {
      consoleTitle
    },
    computed: {
      checkGroup: function () {
        let arr = []
        for (var i = 0; i < this.checkAllGroup.length; i++) {
          let tmp = ''
          switch (this.checkAllGroup[i]) {
            case '电视剧[推荐]':
              tmp = 'index_teleplay_puts'
              break
            case '电视剧[最近更新]':
              tmp = 'index_teleplay_news'
              break
            case '电影[推荐]':
              tmp = 'index_movie_puts'
              break
            case '电影[最近更新]':
              tmp = 'index_movie_news'
              break
            case '动漫[推荐]':
              tmp = 'index_cartoon_puts'
              break
            case '动漫[最近更新]':
              tmp = 'index_cartoon_news'
              break
            case '综艺[推荐]':
              tmp = 'index_variety_puts'
              break
            case '综艺[最近更新]':
              tmp = 'index_variety_news'
              break
            case 'MV[推荐]':
              tmp = 'index_mv_puts'
              break
            case 'MV[最近更新]':
              tmp = 'index_mv_news'
              break
            case '其它影视[推荐]':
              tmp = 'index_other_puts'
              break
            case '其它影视[最近更新]':
              tmp = 'index_other_news'
              break
          }
          arr.push(tmp)
        }
        return arr
      }
    },
    methods: {
      handleCheckAll () {
        if (this.indeterminate) {
          this.checkAll = false
        } else {
          this.checkAll = !this.checkAll
        }
        this.indeterminate = false

        if (this.checkAll) {
          this.checkAllGroup = [
            '电视剧[推荐]', '电视剧[最近更新]',
            '电影[推荐]', '电影[最近更新]',
            '动漫[推荐]', '动漫[最近更新]',
            '综艺[推荐]', '综艺[最近更新]',
            'MV[推荐]', 'MV[最近更新]',
            '其它影视[推荐]', '其它影视[最近更新]'
          ]
        } else {
          this.checkAllGroup = []
        }
      },
      checkAllGroupChange (data) {
        if (data.length === 4) {
          this.indeterminate = false
          this.checkAll = true
        } else if (data.length > 0) {
          this.indeterminate = true
          this.checkAll = false
        } else {
          this.indeterminate = false
          this.checkAll = false
        }
      },
      onclear: function () {
        this.axios({
          url: clearCache,
          method: 'GET',
          params: {
            clearGroup: this.checkGroup
          }
        }).then(response => {
          this.$Message.success('清除成功.')

          setTimeout(
            function () {
              window.location.reload()
            }, 500
          )
        })
      }
    }
  }
</script>

<style scoped>
</style>
