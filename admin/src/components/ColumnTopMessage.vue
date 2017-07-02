<template>
  <div class="alert" :class="alertClass">
    <p :class="{ alertMessage: showClose }">
      <slot></slot>
    </p>

    <span class="alertClose" :class="{ hide: !showClose }">
      <Button :type="type" size="small" @click="readNotice">不再显示</Button>
    </span>
  </div>
</template>

<script>
  export default {
    props: {
      type: {
        type: String,
        default: 'info'   // 可选值：info / success / warning
      },
      showClose: {
        type: Boolean,
        default: true
      }
    },
    data: function () {
      return {
        showAlert: true
      }
    },
    computed: {
      alertClass: function () {
        return {
          'hide': !this.showAlert,
          'alert-info': this.type === 'info',
          'alert-success': this.type === 'success',
          'alert-warning': this.type === 'warning'
        }
      }
    },
    methods: {
      readNotice: function () {
        this.showAlert = !this.showAlert
        this.$emit('read')
      }
    }
  }
</script>

<style scoped>
  .alert {
    padding: 6px 12px;
    line-height: 22px;
    margin-bottom: 6px;
    border-radius: 0px;
    border: 1px solid transparent;
    position:relative;
  }
  .alert .alertMessage {
    padding-right:110px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
  .alert .alertClose {
    position:absolute;
    right:12px;
    bottom:5px;
  }
  .alert-warning {
    color: #f68300;
    background-color: #FCF8E2;
    border-color: #FBECCB;
  }
  .alert-success {
    color: #090;
    background-color: #F2FFEA;
    border-color: #C7DDB9;
  }
  .alert-info {
    color: #06C;
    background-color: #F9F9F9;
    border-color: #DDD
  }
</style>
