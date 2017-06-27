<template>
  <div class="main">
    <top-bar></top-bar>
    <div class="main-body">
      <left-menu></left-menu>
      <div class="rightView">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
  // Import Frame
  import leftMenu from '../pages/main/LeftMenu'
  import topBar from '../pages/main/TopBar'

  export default {
    name: 'admin',
    data () {
      return {

      }
    },
    components: {
      leftMenu,
      topBar
    }
  }
</script>

<style>
  @import "../assets/css/reset.css";
  @import "../assets/css/admin.css";
</style>
