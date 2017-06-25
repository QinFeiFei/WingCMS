<template>
  <div class="item-menu">
    <div class="view-body-navbar">view-body-navbar</div>
    <div class="view-body-collapse">
      <Icon type="chevron-left"></Icon>
    </div>
    <div class="view-body-content">view-body-content</div>
  </div>
</template>

<script>
export default {
  name: 'itemMenu',
  props: {
    childMenus: {
      type: Object,
      default: function () {
        return { message: 'hello' }
      }
    }
  },
  data: function () {
    return {}
  },
  methods: {

  }
}
</script>

<style scoped>

</style>
