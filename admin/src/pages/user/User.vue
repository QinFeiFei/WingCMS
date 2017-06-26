<template>
  <div>
    <item-menu :childMenus="childMenus"></item-menu>
    <div class="view-body fold">
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
      childMenus: {
        title: '用户管理',
        menus: [
          {
            itemName: '标题一',
            routeName: 'UserList',
            active: true,
            display: false
          },
          {
            itemName: '标题二',
            routeName: 'UserPage',
            active: false,
            display: false
          },
          {
            itemName: '二级菜单',
            active: false,
            display: false,
            child: [
              { childName: '二级菜单1' },
              { childName: '二级菜单2' }
            ]
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
