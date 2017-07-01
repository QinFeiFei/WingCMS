<template>
  <div>
    <item-menu :childMenus="childMenus" @fold="changeFold"></item-menu>
    <div class="view-body">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
  import itemMenu from '../main/ItemMenu'
  export default {
    name: 'tv',
    data: function () {
      return {
        isFold: true,
        childMenus: {
          title: '影视管理',
          menus: [
            {
              itemName: '资源概览',
              routeName: 'TvOverView',
              active: true,
              display: false
            },
            {
              itemName: '所有资源',
              active: false,
              display: false,
              child: [
                { childName: '电影', routeName: 'MovieList', active: false },
                { childName: '电视剧', routeName: 'TeleplayList', active: false },
                { childName: '动漫', routeName: 'CartoonList', active: false },
                { childName: '综艺', routeName: 'VarietyList', active: false },
                { childName: '音乐MV', routeName: 'MvList', active: false },
                { childName: '公开课', routeName: 'OpenclassList', active: false },
                { childName: '其它短片', routeName: 'OtherList', active: false }
              ]
            },
            {
              itemName: '电影专题',
              active: false,
              display: false,
              child: [
                { childName: '所有专题', routeName: 'UserPage', active: false },
                { childName: '回收站', routeName: 'UserList', active: false }
              ]
            },
            {
              itemName: '未来添加',
              routeName: 'xxx',
              active: false,
              display: false
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
