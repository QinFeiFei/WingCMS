<template>
  <div>
    <item-menu></item-menu>
    <div class="view-body">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import itemMenu from '../main/ItemMenu'
export default {
  name: 'user',
  data: function () {
    return {
      menuItems: {
        title: '用户管理',
        datas: [
          {
            itemName: '标题一'
          },
          {
            itemName: '标题二'
          }
        ]
      }
    }
  },
  components: {
    itemMenu
  }
}
</script>

<style scoped>

</style>
