<template>
  <div class="leftMenu">
    <div class="sidebar-inner">
      <div class="sidebar-fold"><Icon type="drag navicon" /></div>

      <Menu theme="dark" style="width:180px;">
        <Submenu name="user">
          <template slot="title">
            用户管理
          </template>
          <router-link :to="{ name: 'UserList' }"><Menu-item name="userList">所有用户</Menu-item></router-link>
          <router-link :to="{ name: 'UserPage' }"><Menu-item name="userPage">单页用户</Menu-item></router-link>
        </Submenu>
        <Submenu name="article">
          <template slot="title">
            内容管理
          </template>
          <Menu-item name="1-1">文章管理</Menu-item>
          <Menu-item name="1-2">评论管理</Menu-item>
          <Menu-item name="1-3">举报管理</Menu-item>
        </Submenu>
      </Menu>


    </div>
  </div>
</template>

<script>
  export default {
    name: 'leftMenu',
    data: function () {
      return {}
    },
    components: {

    }
  }
</script>

<style scoped>

</style>
