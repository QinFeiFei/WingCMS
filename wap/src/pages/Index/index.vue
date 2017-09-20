<template lang="html">
  <div class="index-page">
    <!-- 头部 -->
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

    <!-- 焦点图 -->
    <swiper :options="swiperOption" ref="mySwiper">
       <swiper-slide>
          <img src="http://mshopimg2.meitudata.com/59290fe961c4971444.jpg" alt="">
       </swiper-slide>
       <swiper-slide>
         <img src="http://mshopimg4.meitudata.com/58db95cf9d82545293.jpg" alt="">
       </swiper-slide>
       <swiper-slide>
         <img src="http://mshopimg4.meitudata.com/5912da04efd6e11335.jpg" alt="">
       </swiper-slide>
       <swiper-slide>
         <img src="http://mshopimg2.meitudata.com/579aedbde2d0619482.jpg" alt="">
       </swiper-slide>
       <swiper-slide>
         <img src="http://mshopimg1.meitudata.com/5921032b47fff66246.jpg" alt="">
       </swiper-slide>
       <div class="swiper-pagination"  slot="pagination"></div>
   </swiper>

    <!-- 小导航 -->
    <div class="view category">
      <ul class="list category">
        <li class="item">
          <router-link to="/phone">
            <i class="icon phone"></i>
            <span class="text">电影</span>
          </router-link>
        </li>
        <li class="item">
          <router-link to="/goods">
            <i class="icon good"></i>
            <span class="text">电视剧</span>
          </router-link>
        </li>
        <li class="item">
          <router-link to="/services">
            <i class="icon service"></i>
            <span class="text">动漫</span>
          </router-link>
        </li>
        <li class="item">
          <router-link to="/club">
            <i class="icon club"></i>
            <span class="text">综艺</span>
          </router-link>
        </li>
      </ul>
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

    <!-- 热门推荐 -->
    <indexHot></indexHot>

    <list :listData="movieList" listTitle="热门电影" listTitleSrc="/tv/movie"></list>
    <list :listData="teleplayList" listTitle="热门电视剧" listTitleSrc="/tv/teleplay"></list>
    <list :listData="cartoonList" listTitle="热门动漫" listTitleSrc="/tv/cartoon"></list>
    <list :listData="varietyList" listTitle="热门综艺" listTitleSrc="/tv/variety"></list>

    <!-- 底部 -->
    <goTop></goTop>
    <footBar></footBar>
  </div>
</template>

<script>
// import indexPhone from './Index_phone'
import indexHot from './Index_hot'
import list from '../../components/list_style1'
import goTop from '../public/gotop'
import footBar from '../public/footer'
export default {
  data () {
    return {
      swiperOption: {
        autoplay: 3000,
        initialSlide: 1,
        loop: true,
        paginationClickable: true,
        pagination: '.swiper-pagination'
      },
      modalShow: false,

      movieList: [
        {
          imgSrc: 'http://mshopimg3.meitudata.com/563745f67f45545765.jpg',
          title:'美图遥控器第二代',
          desc:'史上最好看的电影',
          price:89
        },
        {
          imgSrc: 'http://mshopimg1.meitudata.com/577f007c56ea942623.jpg',
          title:'MeituFamily印花移动电源',
          desc:'史上最好看的电影',
          price:189
        },
        {
          imgSrc: 'http://mshopimg3.meitudata.com/58f821664f7cc70281.jpg?thumb220',
          title:'美图T8钢化玻璃贴膜',
          desc:'原装正品，品质保证',
          price:39
        },
        {
          imgSrc: 'http://mshopimg2.meitudata.com/57fe0a266385b34439.jpg?thumb220',
          title:'MeituFamily潮趣手机壳',
          desc:'潮趣手机壳',
          price:99
        },
        {
          imgSrc: 'http://mshopimg1.meitudata.com/5795a7a49ed5238759.jpg?thumb220',
          title:'美图M6/美图M6s/美图T8手机数据线',
          desc:'原装正品，品质保证',
          price:39
        },
        {
          imgSrc: 'http://mshopimg3.meitudata.com/561e03a60e3cb47662.jpg?thumb220',
          title:'美图手机专属耳机',
          desc:'美图专属耳机',
          price:79
        }

      ],
      teleplayList: [{}, {}],
      cartoonList: [{}, {}],
      varietyList: [{}, {}]
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
  },
  components: {
    // indexPhone,
    indexHot,
    list,
    goTop,
    footBar
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

.swiper-slide img{
  width: 100%;
}
.index-page .swiper-pagination-bullet {
  width: 0.8rem;
  height: 0.8rem;
  background-color: #fff;
}

.view {
  width: 100%;
  height: 10rem;
}
.view a {
  text-decoration: none;
}
.view{
  width: 100%;
  height: 10rem;
  background-color: #fff;
}
.view .list{
  width: 100%;
  height: 100%;
  list-style: none;
  display: flex;
  display: -webkit-flex;
}
 .category .item{
  width: 25%;
  height: 10rem;
  padding-top: 1.5rem;
  box-sizing: border-box;
}
.category .item .text {
  height: 2rem;
  line-height: 2rem;
  text-align: center;
  font-size: 1.4rem;
  display: block;
  color: #5c5c5c;
  overflow: hidden;
  margin-top: .5rem;
  text-decoration: none;
}
.view .item .icon {
  display: block;
  width: 5rem;
  height: 5rem;
  border-radius: 50%;
  margin: 0 auto;
}
.phone {
  background:#46c0ff url(../../assets/images/view_icon_03.png)center center no-repeat;
  background-size: 1.8rem;
}
.good {
  background:#94d00b url(../../assets/images/view_icon_06.png)center center no-repeat;
  background-size: 2.2rem;
}
.service {
  background:#ff9c7d url(../../assets/images/view_icon_09.png)center center no-repeat;
  background-size: 2rem;
}
.club {
  background:#ff71aa url(../../assets/images/view_icon_12.png)center center no-repeat;
  background-size: 4rem;
}
.mask {
  height: 245rem;
  position: absolute;
  left: 0;
  top: 4.4rem;
  right: 0;
  background: #000;
  opacity: .6;
  z-index: 999;
}
.search-modal {
  position: absolute;
  top: 4.4rem;
  left: 0;
  right: 0;
  z-index: 999;
  background: #fff;
  border-top: 1px solid #ddd;
  box-shadow: 0 1px 4px rgba(0,0,0,.2)!important;
}
.search-modal .search-box{
  width: 100%;
  transition: top .2s linear,opacity .2s linear;
}
.search-box .input-box{
  margin-top: 1rem;
  height: 3.2rem;
  width: 26rem;
  margin-left: 1.5rem;
  border: 1px solid #efefef;
  border-radius: 3px;
  float: left;
  display: flex;
  align-items: center;
}
.input-box input {
  border: none;
  outline: none;
  flex:1;
  text-indent: 0.7rem;
}
.input-box .searchIcon {
  display: block;
  width: 2rem;
  height: 2rem;
  background: url(../../assets/images/iconSearch.png) no-repeat;
  background-size: cover;
  /*margin-top: 2rem;
  margin-right: 1rem;*/
}
.search-box .cancel {
  float: right;
  width: 3rem;
  margin-top: 10px;
  line-height: 3.2rem;
  color: #5c5c5c;
  font-size: 1.4rem;
}
.search-category {
  padding-top: 2rem;
  margin-left: 2rem;
  clear: both;
}
.subcate dt{
    font-size: 1.6rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}
.dd a{
  margin-right: 2rem;
  font-size: 1.4rem;
  color: #5c5c5c;
  margin-bottom:0.3rem;
}
</style>
