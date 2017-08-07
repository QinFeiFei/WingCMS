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
      <Button type="primary">立即清除</Button>
    </div>
  </div>
</template>
<script type="text/ecmascript-6">
  import consoleTitle from '../../components/ConsoleTitle'

  export default {
    created: function () {
    },
    data: function () {
      return {
      }
    },
    components: {
      consoleTitle
    },
    methods: {
    }
  }
</script>

<style scoped>
</style>
