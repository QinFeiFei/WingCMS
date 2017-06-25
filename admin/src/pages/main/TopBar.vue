<template>
  <div class="topBar">
    <div class="bar-item logo ico-item"><Icon type="home"></Icon></div>
    <router-link :to="{ name:'dashBoard' }"><div class="bar-item">控制台</div></router-link>
    <div class="bar-item">产品与功能</div>
    <Dropdown class="bar-item bar-item-right" trigger="hover" :visible="visible">
      <a href="javascript:void(0)" @click="handleOpen">
        158133434@qq.com
        <Icon type="arrow-down-b"></Icon>
      </a>
      <Dropdown-menu slot="list">
        adsfasdfasdfasdfasdfasdf
      </Dropdown-menu>
    </Dropdown>
    <div class="bar-item bar-item-right ico-item">
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

<script>
  export default {
    name: 'topBar',
    data: function () {
      return {
        visible: false
      }
    },
    methods: {
      handleOpen () {
        this.visible = true
      },
      handleClose () {
        this.visible = false
      }
    },
    components: {
    }
  }
</script>

<style scoped>

</style>
