<template>
  <div class="family-box">
    <div class="top">
      <h3 class="title">{{ listTitle }}</h3>
      <router-link :to="listTitleSrc"><span class="more">更多</span></router-link>
    </div>
    <div class="item-list">
      <ul class="list">
        <li class="item" v-for="item in listData">
          <router-link to='./detail'>
            <div class="item-image">
              <img :src=item.imgSrc alt="">
            </div>
            <div class="item-info">
              <h4 class="itemtitle">{{item.title}}</h4>
              <p class="desc">{{item.desc}}</p>
            </div>
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      listData: {
        type: Array,
        required: true
      },
      listTitle: {
        type: String,
        required: false
      },
      listTitleSrc: {
        type: String,
        required: false
      }
    }
  }
</script>

<style scoped>
  .family-box {
    clear: both;
  }
  .list{
    width: 100%;
    background-color: #fff;
  }
  .top{
    position: relative;
    background:  #efefef;
  }
  .title{
    font-size: 1.6rem;
    height: 4.6rem;
    line-height: 4.6rem;
    color: #666;
    font-weight: 500;
    margin-left: 2rem;
  }
  .more {
    font-size: 1.4rem;
    position: absolute;
    right: 2rem;
    top: 2rem;
    color: #666;
  }
  .item-list .list .item{
    float: left;
    width: 50%;
    height: 22.5rem;
    position:relative;
    background-color: #fff;
    align-items: center;
    justify-content: center;
    padding: 0;
  }
  .item-list .list .item:nth-child(2n+1):before {
    content:'';
    position: absolute;
    top:0;
    right:0;
    bottom:0;
    width:.1rem;
    background: #efefef;
  }
  .item-list .list .item:after {
    content:'';
    position: absolute;
    left:0;
    right:0;
    bottom:0;
    height:.1rem;
    background: #efefef;
  }
  .item-list .list .item .item-image{
    margin: 0.5rem auto 0 ;
    /*display: block;*/
  }
  .item-image img{
    width:95%;
    height:210px;
    display:block;
    margin:0 auto;
  }
  .item-info{
    width: 100%;
    text-align: center;
  }
  .item-info .itemtitle {
    line-height: 1.5;
    font-size: 1.4rem;
    color: #000;
    font-weight: normal;
    white-space:nowrap;
    text-overflow:ellipsis;
    overflow: hidden;
  }
  .item-info .desc {
    line-height: 1.5;
    font-size: 1.4rem;
    color: #999;
  }
</style>
