<template>
  <div style="height:100%;">
    <item-menu :childMenus="childMenus"></item-menu>
    <div class="view-body">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
  // import Vue from 'vue'
  import itemMenu from '../main/ItemMenu'

  // import pcMixins from '../../mixins/pc'
  // Vue.mixin(pcMixins)

  export default {
    name: 'setting',
    data: function () {
      return {
        childMenus: {
          title: '设置',
          menus: [
            {
              itemName: '基础设置',
              routeName: 'settingIndex',
              active: true,
              display: false
            },
            {
              itemName: '消息通知',
              active: false,
              display: false,
              child: [
                { childName: '邮件测试', routeName: 'settingEmailTest', active: false }
              ]
            },
            {
              itemName: '管理员权限',
              active: false,
              display: false,
              child: [
                { childName: '邮件测试', routeName: 'settingEmailTest', active: false }
              ]
            }
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
