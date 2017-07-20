<template>
  <div style="height:100%;">
    <item-menu :childMenus="childMenus"></item-menu>
    <div class="view-body">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
  import Vue from 'vue'
  import userMixins from '../../mixins/user'
  import itemMenu from '../main/ItemMenu'
  Vue.mixin(userMixins)

  export default {
    name: 'user',
    data: function () {
      return {
        isFold: true,
        childMenus: {
          title: '用户管理',
          menus: [
            {
              itemName: '所有会员',
              routeName: 'UserList',
              active: true,
              display: false
            },
            {
              itemName: '会员通知',
              routeName: 'UserPage',
              active: false,
              display: false
            }
            /*
            ,{
              itemName: '二级菜单',
              active: false,
              display: false,
              child: [
                { childName: '二级菜单1', routeName: 'UserPage', active: false },
                { childName: '二级菜单2', routeName: 'UserList', active: false }
              ]
            }
            */
          ]
        }
      }
    },
    methods: {
    },
    components: {
      itemMenu
    }
  }
</script>

<style scoped>
</style>
