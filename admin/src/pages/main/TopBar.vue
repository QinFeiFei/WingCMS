<template>
  <div class="topBar">
    <div class="bar-item logo ico-item"><Icon type="home"></Icon></div>
    <router-link :to="{ name:'dashBoard' }"><div class="bar-item">控制台</div></router-link>
    <div class="bar-item">产品与功能</div>
    <Dropdown class="bar-item bar-item-right" trigger="hover" :visible="visible" placement="bottom-end">
      <a href="javascript:void(0)" @click="handleOpen">
        {{ adminInfo.admin_name }}　
        <Icon type="arrow-down-b"></Icon>
      </a>
      <Dropdown-menu slot="list">
        <Dropdown-item>修改资料</Dropdown-item>
        <Dropdown-item><p @click="logout">退出登陆</p></Dropdown-item>
      </Dropdown-menu>
    </Dropdown>

    <div class="bar-item bar-item-right ico-item" @click="fullscreen">
      <Icon type="android-expand"></Icon>
    </div>
    <Dropdown class="bar-item bar-item-right ico-item" trigger="hover" :visible="visible">
      <Icon type="android-notifications"></Icon>
      <Badge count="10"></Badge>

      <Dropdown-menu slot="list">
        adsfasdfasdfasdfasdfasdf
      </Dropdown-menu>
    </Dropdown>
  </div>
</template>

<script type="text/ecmascript-6">
  import screenfull from 'screenfull'
  import { getAdminInfo, logoutUrl } from '../../api/main'

  export default {
    name: 'topBar',
    created: function () {
      this.setAdmin()
    },
    data: function () {
      return {
        visible: false
      }
    },
    methods: {
      setAdmin: function () {
        this.axios({
          url: getAdminInfo,
          method: 'GET'
        }).then(response => {
          this.adminInfo = response.data
        })
      },
      logout: function () {
        this.axios({
          url: logoutUrl,
          method: 'POST'
        }).then(response => {
          localStorage.removeItem('token')
          this.$router.push({ name: 'login' })
          this.$Message.success('注销成功')
        })
      },
      handleOpen () {
        this.visible = true
      },
      handleClose () {
        this.visible = false
      },
      fullscreen: function () {
        if (!screenfull.enabled) {
          this.$Message.warning({
            content: 'you browser can not work'
          })
          return false
        }
        screenfull.toggle()
      }
    },
    components: {
    }
  }
</script>

<style scoped>
</style>
