<template>
  <div class="console-title relative">
    <div class="fleft">
      <div class="ng-binding">{{ title }}</div>
      <div class="inline-block"><slot name="left"></slot></div>
    </div>
    <div class="fright"><slot name="right"></slot></div>
    <div class="clearbox"></div>
    <div class="console-content">
      <slot name="content"></slot>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      title: String
    },
    data: function () {
      return {}
    },
    methods: function () {
    }
  }
</script>

<style scoped>
  .console-title {
    padding-top: 16px;
  }
  .console-title-border {
    border-bottom: 1px solid #DDD;
  }
  .ng-binding {
    display: inline-block;
    text-indent: 8px;
    border-left: 2px solid #88B7E0;
    margin-right: 8px;
    vertical-align: top;
    font-size:14px;
  }
  .console-content {
    margin-top: 15px;
    background:#444;
  }
</style>
