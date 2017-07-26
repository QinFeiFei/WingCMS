<template>
  <div class="leftMenu" :class="{ menuUnFold: menuFold }">
    <div class="sidebar-inner">
      <Menu theme="dark" style="width:180px;">

        <Submenu name="user">
          <template slot="title">
            <Icon type="person"></Icon>会员管理
          </template>
          <router-link :to="{ name: 'UserList' }"><Menu-item name="0-1"><Icon type="person"></Icon>所有用户</Menu-item></router-link>
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
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="2-1"><Icon type="person"></Icon>所有资源</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="2-2"><Icon type="person"></Icon>专题管理</Menu-item></router-link>
        </Submenu>

        <Submenu name="webPC">
          <template slot="title">
            <Icon type="person"></Icon>
            PC端
          </template>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="3-1"><Icon type="person"></Icon>首页管理</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="3-2"><Icon type="person"></Icon>专题管理</Menu-item></router-link>
        </Submenu>

        <Submenu name="webMobile">
          <template slot="title">
            <Icon type="person"></Icon>
            手机端
          </template>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="4-1"><Icon type="person"></Icon>权限设置</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="4-2"><Icon type="person"></Icon>专题管理</Menu-item></router-link>
        </Submenu>

        <Submenu name="wechat">
          <template slot="title">
            <Icon type="person"></Icon>
            微信平台
          </template>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="5-1"><Icon type="person"></Icon>权限设置</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="5-2"><Icon type="person"></Icon>专题管理</Menu-item></router-link>
        </Submenu>

        <Submenu name="stat">
          <template slot="title">
            <Icon type="person"></Icon>
            数据统计
          </template>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="6-1"><Icon type="person"></Icon>权限设置</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="6-2"><Icon type="person"></Icon>友情链接</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="6-3"><Icon type="person"></Icon>反馈管理</Menu-item></router-link>
        </Submenu>

        <Submenu name="setting">
          <template slot="title">
            <Icon type="person"></Icon>
            设置管理
          </template>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="7-1"><Icon type="person"></Icon>权限设置</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="7-2"><Icon type="person"></Icon>友情链接</Menu-item></router-link>
          <router-link :to="{ name: 'TvSpecial' }"><Menu-item name="7-3"><Icon type="person"></Icon>反馈管理</Menu-item></router-link>
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
