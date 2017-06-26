<template>
  <div>
    <item-menu :childMenus="childMenus"></item-menu>
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
      childMenus: {
        title: '用户管理',
        menus: [
          {
            itemName: '标题一',
            routeName: 'UserList',
            active: true
          },
          {
            itemName: '标题二',
            routeName: 'UserPage'
          },
          {
            itemName: '二级菜单',
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
