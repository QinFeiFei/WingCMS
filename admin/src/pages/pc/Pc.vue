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
  import pcMixins from '../../mixins/pc'
  import itemMenu from '../main/ItemMenu'
  Vue.mixin(pcMixins)

  export default {
    name: 'pc',
    data: function () {
      return {
        childMenus: {
          title: 'PC端管理',
          menus: [
            {
              itemName: '首页缓存清理',
              routeName: 'PcIndexClearCache',
              active: true,
              display: false
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
