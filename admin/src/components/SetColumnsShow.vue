<template>
  <div>
  <Modal v-model="modalColumns" title="设置显示的列" @on-ok="setShowTableColumns" @on-cancel="cancel" width="500">
    <div class="columnItem_" v-for="(item, index) in columnShow">
      <span><Checkbox v-model="item.show">&nbsp;{{ item.text }}</Checkbox></span>
    </div>
  </Modal>
  </div>
</template>
<script>
  export default {
    props: {
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
    computed: {
      modalColumns: function () {
        return this.$store.state.columnsShow
      }
    },
    created: function () {
      this.columnShow_ = this.columnShow
    },
    methods: {
      setShowTableColumns: function () {
        this.$emit('set', this.columnShow_)
        this.cancel()
      },
      cancel: function () {
        this.$store.commit('ToggleColumnsShow')
      }
    }
  }
</script>
<style scoped>
  .columnItem_ {
    width:25%;
    display:inline-block;
    padding:10px 0px;
  }
</style>
