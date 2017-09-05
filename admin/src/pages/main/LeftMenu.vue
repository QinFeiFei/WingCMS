<template>
  <div class="leftMenu" :class="{ menuUnFold: menuFold }">
    <div class="sidebar-inner">
      <Menu theme="dark" :accordion="true" style="width:180px;">

        <Submenu name="core">
          <template slot="title">
            <Icon type="person"></Icon>基础功能
          </template>
          <router-link :to="{ name: 'UserList' }"><Menu-item name="0-0"><Icon type="person"></Icon>用户管理</Menu-item></router-link>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="0-1"><Icon type="person"></Icon>影视管理</Menu-item></router-link>
          <router-link :to="{ name: 'TvOverView' }"><Menu-item name="0-2"><Icon type="person"></Icon>文章管理</Menu-item></router-link>
          <router-link :to="{ name: 'settingIndex' }"><Menu-item name="0-3"><Icon type="person"></Icon>设置中心</Menu-item></router-link>
        </Submenu>

        <Submenu name="webPC">
          <template slot="title">
            <Icon type="person"></Icon>
            PC端
          </template>
          <router-link :to="{ name: 'PcIndexClearCache' }"><Menu-item name="3-1"><Icon type="person"></Icon>首页管理</Menu-item></router-link>
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
