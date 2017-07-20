<template>
  <div class="leftMenu" :class="{ menuUnFold: menuFold }">
    <div class="sidebar-inner">
      <Menu theme="dark" style="width:180px;">

        <Submenu name="user">
          <template slot="title">
            <Icon type="person"></Icon>会员管理
          </template>
          <router-link :to="{ name: 'UserList' }"><Menu-item name="userList"><Icon type="person"></Icon>所有用户</Menu-item></router-link>
          <!--<router-link :to="{ name: 'UserPage' }"><Menu-item name="userPage"><Icon type="person"></Icon>单页用户</Menu-item></router-link>-->
        </Submenu>

        <Submenu name="article">
          <template slot="title">
            <Icon type="person"></Icon>
            内容资讯
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

        <Submenu name="tv">
          <template slot="title">
            <Icon type="person"></Icon>
            PC端
          </template>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="3-1"><Icon type="person"></Icon>权限设置</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="3-2"><Icon type="person"></Icon>专题管理</Menu-item></router-link>
        </Submenu>

        <Submenu name="tv">
          <template slot="title">
            <Icon type="person"></Icon>
            手机端
          </template>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="3-1"><Icon type="person"></Icon>权限设置</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="3-2"><Icon type="person"></Icon>专题管理</Menu-item></router-link>
        </Submenu>

        <Submenu name="tv">
          <template slot="title">
            <Icon type="person"></Icon>
            微信公众平台
          </template>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="3-1"><Icon type="person"></Icon>权限设置</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="3-2"><Icon type="person"></Icon>专题管理</Menu-item></router-link>
        </Submenu>

        <Submenu name="tv">
          <template slot="title">
            <Icon type="person"></Icon>
            数据统计
          </template>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="3-1"><Icon type="person"></Icon>权限设置</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="3-2"><Icon type="person"></Icon>友情链接</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="3-2"><Icon type="person"></Icon>反馈管理</Menu-item></router-link>
        </Submenu>

        <Submenu name="tv">
          <template slot="title">
            <Icon type="person"></Icon>
            设置管理
          </template>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="3-1"><Icon type="person"></Icon>权限设置</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="3-2"><Icon type="person"></Icon>友情链接</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="3-2"><Icon type="person"></Icon>反馈管理</Menu-item></router-link>
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
