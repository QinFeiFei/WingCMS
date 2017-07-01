<template>
  <div class="leftMenu" :class="{ menuUnFold: menuFold }">
    <div class="sidebar-inner">
      <Menu theme="dark" style="width:180px;">

        <Submenu name="user">
          <template slot="title">
            <Icon type="person"></Icon>用户管理
          </template>
          <router-link :to="{ name: 'UserList' }"><Menu-item name="userList"><Icon type="person"></Icon>所有用户</Menu-item></router-link>
          <router-link :to="{ name: 'UserPage' }"><Menu-item name="userPage"><Icon type="person"></Icon>单页用户</Menu-item></router-link>
        </Submenu>

        <Submenu name="article">
          <template slot="title">
            <Icon type="person"></Icon>
            内容管理
          </template>
          <Menu-item name="1-1"><Icon type="person"></Icon>文章管理</Menu-item>
          <Menu-item name="1-2"><Icon type="person"></Icon>评论管理</Menu-item>
          <Menu-item name="1-3"><Icon type="person"></Icon>举报管理</Menu-item>
        </Submenu>

        <Submenu name="tv">
          <template slot="title">
            <Icon type="person"></Icon>
            影视管理
          </template>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="3-1"><Icon type="person"></Icon>所有资源</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="3-2"><Icon type="person"></Icon>专题管理</Menu-item></router-link>
        </Submenu>

      </Menu>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'leftMenu',
    data: function () {
      return {
        menuFold: true
      }
    },
    methods: {
    },
    components: {

    }
  }
</script>

<style scoped>
</style>
