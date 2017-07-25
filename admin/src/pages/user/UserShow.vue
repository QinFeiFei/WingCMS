<template>
  <div>
    <!-- 栏目Title -->
    <console-title title="会员详情" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <Button type="primary" @click="$router.back()"><Icon type="chevron-left"></Icon>　返回</Button>
      </div>
    </console-title>

    <Tabs>
      <Tab-pane label="基本信息" icon="ivu-icon ivu-icon-person">
        <div class="tab-info">

        </div>

        <h2 class="tab-title"><Icon type="locked"></Icon> 帐户安全信息</h2>
        <div class="tab-info">

        </div>

        <h2 class="tab-title"><Icon type="ios-heart"></Icon> VIP会员信息</h2>
        <div class="tab-info">

        </div>
      </Tab-pane>
      <Tab-pane label="会员订单">标签二的内容</Tab-pane>
      <Tab-pane label="预存款详情">标签三的内容</Tab-pane>
      <Tab-pane label="其它详情">标签三的内容</Tab-pane>
    </Tabs>
  </div>
</template>

<script type="text/ecmascript-6">
  import consoleTitle from '../../components/ConsoleTitle'

  export default {
    name: 'userShow',
    data: function () {
      return {}
    },
    components: {
      consoleTitle
    }
  }
</script>

<style scoped>

</style>
