<template>
  <div>
    <item-menu :childMenus="childMenus" @fold="changeFold"></item-menu>
    <div class="view-body" :class="{ fold: isFold }">
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
      isFold: true,
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
              { childName: '二级菜单1', routeName: 'UserPage', active: false },
              { childName: '二级菜单2', routeName: 'UserList', active: false }
            ]
          }
        ]
      }
    }
  },
  methods: {
    changeFold: function (state) {
      this.isFold = state
    }
  },
  components: {
    itemMenu
  }
}
</script>

<style scoped>

</style>
