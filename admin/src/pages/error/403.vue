<template>
  <div class="errPage-container">
    <Button @click="back" class="pan-back-btn"><Icon type="chevron-left"></Icon>　返回</Button>
    <Row>
      <Col :span="12">
        <h1 class="text-jumbo text-ginormous">Oops!</h1>
        <p style="font-size:16px !important;color:#000;margin-bottom:20px;">gif来源<a href='https://zh.airbnb.com/' target='_blank'>airbnb</a> 页面</p>
        <h2 style="margin-bottom:20px;color:#000">你没有权限去该页面</h2>
        <h6 style="font-size:14px;margin-bottom:25px;">如有不满请联系你领导</h6>
        <ul class="list-unstyled">
          <li>或者你可以去:</li>
          <li class="link-type">
            <router-link to="/dashboard">回首页</router-link>
          </li>
          <li class="link-type"><a href="https://www.taobao.com/">随便看看</a></li>
          <li><a @click.prevent="dialogVisible=true" href="#">点我看图</a></li>
        </ul>
      </Col>
      <Col :span="12">
        <img :src="errGif" width="313" height="428" alt="Girl has dropped her ice cream.">
      </Col>
    </Row>

    <Modal title="随便看" v-model="dialogVisible" width="830">
      <p slot="header"></p>
      <img class="pan-img" :src="ewizardClap">
      <div slot="footer"></div>
    </Modal>
  </div>
</template>

<script>
    import errGif from '../../assets/images/401.gif'
    export default {
      data () {
        return {
          errGif: errGif + '?' + +new Date(),
          ewizardClap: 'https://wpimg.wallstcn.com/007ef517-bafd-4066-aae4-6883632d9646',
          dialogVisible: false
        }
      },
      methods: {
        back () {
          if (this.$route.query.noGoBack) {
            this.$router.push({ path: '/dashboard' })
          } else {
            this.$router.go(-1)
          }
        }
      }
    }
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
  h1 {
    margin: 40px 0;
  }
  h2 {
    font-size:24px;
  }
  h6 {
    font-size:12px;
    font-weight: bold;
    color:#000;
  }
  ul li {
    margin-left:30px;
    list-style: circle;
  }
  .errPage-container {
    width: 800px;
    margin: 100px auto;
    .pan-back-btn {
      background: #008489;
      color: #fff;
    }
    .pan-gif {
      margin: 0 auto;
      display: block;
    }
    .pan-img {
      display: block;
      margin: 0 auto;
    }
    .text-jumbo {
      font-size: 60px;
      font-weight: 700;
      color: #484848;
    }
    .list-unstyled {
      font-size: 14px;
      li {
        padding-bottom: 5px;
      }
      a {
        color: #008489;
        text-decoration: none;
        &:hover {
          text-decoration: underline;
        }
      }
    }
  }
</style>
