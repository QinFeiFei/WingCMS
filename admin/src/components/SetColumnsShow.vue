<template>
  <Modal v-model="display" title="设置显示的列" @on-ok="setShowTableColumns" @on-cancel="cancle" width="500">
    <p>对话框内容</p>
    <p>对话框内容</p>
    <p>对话框内容</p>
  </Modal>
</template>
<script>
  export default {
    props: {
      display: {
        type: Boolean,
        default: false,
        require: true
      },
      columnShow: {
        type: Array,
        default: [],
        require: true
      }
    },
    data: function () {
      return {
        columnShow_: []
      }
    },
    methods: {
      setShowTableColumns: function () {
      },
      cancle: function () {
        this.$emit('cancle')
      }
    }
  }
</script>
<style scoped>
</style>
