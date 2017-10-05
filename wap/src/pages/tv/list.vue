<template lang="html">
  <div class="page">
    <header_></header_>

    <div class="swiper-container2">
      <div class="swiper-wrapper">
        <div class="swiper-slide slide1">
          <span class="type" >分类:</span>
        </div>
        <swiper :options="swiperOption">
          <div class="swiper-slide slide2">
            <router-link to='/goods'>
              <span id="all" v-on:click="selectType" class="type Active" >全部</span>
            </router-link>
          </div>
          <div class="swiper-slide slide3">
            <router-link to="/list2">
              <span v-on:click="selectType" class="type" >充电器</span>
            </router-link>
          </div>
          <div class="swiper-slide slide4">
            <router-link to="/list3">
              <span v-on:click="selectType" class="type" >手机壳</span>
            </router-link>
          </div>
          <div class="swiper-slide slide5">
            <router-link to="/listError">
              <span v-on:click="selectType" class="type" >贴膜</span>
            </router-link>
          </div>
          <div class="swiper-slide slide6">
            <router-link to="/listError">
              <span v-on:click="selectType" class="type" >玩具手办</span>
            </router-link>
          </div>
          <div class="swiper-slide slide7">
            <router-link to="/list4">
              <span v-on:click="selectType" class="type" >耳机</span>
            </router-link>
          </div>
          <div class="swiper-slide slide8">
            <router-link to="/list2">
              <span v-on:click="selectType" class="type">时尚服饰</span>
            </router-link>
          </div>
          <div class="swiper-slide slide9">
            <router-link to="/listError">
              <span v-on:click="selectType" class="type" >遥控器</span>
            </router-link>
          </div>
          <div class="swiper-slide slide10">
            <router-link to="/listError">
              <span v-on:click="selectType" class="type" >补光灯</span>
            </router-link>
          </div>
          <div class="swiper-slide slide11">
            <router-link to="/list3">
              <span v-on:click="selectType" class="type">自拍架</span>
            </router-link>
          </div>
        </swiper>
      </div>
    </div>
    <router-view></router-view>
    <footBar></footBar>
  </div>
</template>

<script>
  import header_ from '../public/header'
  import list from '../../components/list_style2'
  import footBar from '../public/footer'
  export default {
    data () {
      return {
        isActive: false,
        typeSwiper: null,
        allShow: true,
        swiperOption: {
          slidesPerView: 4,
          paginationClickable: true,
          spaceBetween: 8
        }
      }
    },

    methods: {
      selectType: function (e) {
        if(e.target.id === 'all') {
          this.allShow = true
        } else {
          this.allShow = false
        }
        document.querySelector('.Active').classList.remove('Active')
        if(!e.target.classList.contains('Active')) {
          e.target.classList.add('Active')
        }
      }
    },
    components: {
      list,
      footBar,
      header_
    }
  }
</script>
<style lang="css">
  input {
    border:none;
    background:none;
  }
  .Active {
    padding: 0.2rem 0.4rem;
    border-radius: .3rem;
    color: #fff !important;
    background: #f55669;
  }
  .page .swiper-container2{
    width: 100%;
    overflow-x: hidden;
    height: 3rem;
    line-height: 3rem;
    background: #fff;
    border-top: 1px solid #efefef;
    border-bottom: 1px solid #efefef;
  }
  .page .swiper-container2 .swiper-wrapper{
    width: 100%;
  }
  .page .swiper-container2 .swiper-slide {
    float: left;
    width: 4rem !important;
    text-align: center;
  }
  .page .swiper-container2 .swiper-slide .type{
    width: 100%;
    font-size: 1.2rem;
    color: #444;
  }
  .type-list {
    width: 100%;
    margin: 0 auto;
    overflow-x: auto;
    background: #fff;
    border-top: 1px solid #eee;
    position: relative;
  }
  .type-list .types {
    width: 100%;
    padding: 1rem;
    display: table;
    table-layout: fixed;
    overflow-x: auto
  }
  .type-list .types .type {
    margin-left: 1rem;
    font-size: 1.4rem;
    float: left;
  }
</style>
