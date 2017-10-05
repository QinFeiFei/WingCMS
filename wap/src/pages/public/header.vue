<template>
  <div>
    <div class="header">
      <img src="../../assets/images/logo.png" alt="">
        <span class="iconButton">
          <router-link :to="homeUrl">
            <i class="icon home"></i>
          </router-link>
        </span>
        <span class="iconButton" @click="showModal">
          <i class="icon search"></i>
        </span>
    </div>

    <!-- 搜索 -->
    <div class="mask" v-show="modalShow"></div>
    <div class="search-modal"  v-show="modalShow">
      <div class="search-box">
        <div class="input-box">
          <i @click="searchhandle" class="searchIcon"></i>
          <input @keypress.enter="searchhandle" type="text" class="keywords" placeholder="请输入要搜索的影视名称">
        </div>
        <span class="btn cancel" @click="showModal">取消</span>
        <div class="search-category">
          <dl class="subcate">
            <dt>所有影视分类</dt>
            <dt class="dd">
              <router-link to=''>电影</router-link>
              <router-link to=''>电视剧</router-link>
              <router-link to=''>动漫</router-link>
              <router-link to=''>综艺</router-link>
              <router-link to=''>动漫</router-link>
              <router-link to=''>MV</router-link>
              <router-link to=''>公开课</router-link>
              <router-link to=''>其它</router-link>
            </dt>
          </dl>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data: function (){
      return {
        modalShow: false
      }
    },
    computed: {
      homeUrl () {
        if (!this.$store.state.cart.login) {
          return '/login'
        } else {
          return '/user'
        }
      }
    },
    methods: {
      showModal: function() {
        if (this.modalShow) {
          this.modalShow = false
        } else {
          this.modalShow = true
        }

      },
      searchhandle: function (e) {
        let keywords = document.querySelector('.keywords').value.trim()
        if (keywords === '') {
          this.$toast({
            message: '未输入查找关键词',
            position: 'top'
          })
          e.preventDefault()
        } else {
          localStorage.setItem('keywords',keywords)
          this.$router.push({path:'/search'})
        }

      }
    }
  }
</script>

<style>
  .header {
    width: 100%;
    height: 4.4rem;
    background-color: #fff;
  }
  .header img {
    width: 11rem;
    height: 2rem;
    margin: 1rem 0 0 1.2rem;
    float: left;
  }
  .header .iconButton {
    float: right;
    width: 4.4rem;
    height: 4.4rem;
    padding: 1.3rem;
    box-sizing: border-box;
  }
  .header:after{
    content:'';
    clear: both;
  }
  .iconButton .icon {
    display: block;
    width: 1.8rem;
    height: 1.8rem;
    background-size: cover;
    vertical-align: middle;
  }
  .search {
    background: url(../../assets/images/iconSearch.png) center center no-repeat;
  }
  .home {
    background: url(../../assets/images/iconHome.png) center center no-repeat;
  }
  .car {
    background: url(../../assets/images/iconCar.png) center center no-repeat;
  }
  .number {
    position: absolute;
    background: #f74554;
    min-width: 1rem;
    height: 1.4rem;
    line-height: 1.4rem;
    font-size: 12px;
    color: #fff;
    top: .3rem;
    right: .3rem;
    text-align: center;
    padding: 0 .3rem;
    border-radius: 1rem;
    box-sizing: border-box;
    font-style: normal;
  }
</style>
