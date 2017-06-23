<template>
  <div class="main">
    <top-bar></top-bar>
    <div class="main-body">
      <left-menu></left-menu>
      <right-view></right-view>
    </div>
  </div>
</template>

<script>
  // Import Frame
  import leftMenu from '../pages/main/LeftMenu'
  import topBar from '../pages/main/TopBar'
  import rightView from '../pages/main/RightView'

  export default {
    name: 'admin',
    data () {
      return {

      }
    },
    components: {
      leftMenu,
      topBar,
      rightView
    }
  }
</script>

<style>
  @import "../assets/css/reset.css";
  @import "../assets/css/admin.css";




</style>
