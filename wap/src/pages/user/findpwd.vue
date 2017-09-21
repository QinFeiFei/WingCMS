<template lang="html">
  <div class="login-page">
    <mt-header title="找回密码">
      <router-link to="/" slot="left">
        <mt-button icon="back"></mt-button>
      </router-link>
      <router-link to='/' slot="right">
        <span class="gohome"></span>
      </router-link>
    </mt-header>
    <div class="login-container">
      <div class="login-input">
        <div class="input-box" style="position:relative">
          <input type="telephone" v-model="tel" class="tel" placeholder="邮箱">
          <span class="xx" style="position:absolute;top:0px;right:0px;background:#444;padding:0px 10px;color:#fff;border-radius:5px;">发送验证码</span>
        </div>
        <div class="input-box">
          <input type="password" v-model="psw" placeholder="六位验证码">
        </div>

        <div class="input-box">
          <input type="password" v-model="psw" placeholder="密码">
        </div>

        <mt-button @click="login" type="primary" size="large">立即找回</mt-button>
        <p class="regTxt">
          <a class="fleft">返回登陆</a>
        </p>
      </div>
    </div>
    <div class="Copyright" style="position:fixed;bottom:0px;left:0px;right:0px;line-height:50px;width:24rem;border-top:1px solid #d2d2d2;margin:0 auto;">
      ©2017 icxtv.com, Inc. 晨曦影视 · 版权所有
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
        tel,
        psw
    }
  },
  methods: {
    login : function (e) {
      // let tel = document.querySelector('.tel').value.trim()
      let tel = this.tel.trim()
      let psw = this.psw
      let reg =  /^1\d{10}$/
      if(psw === '') {
        this.$toast({
          message:'密码不能为空',
          position: 'top'
        })
      } else {
        if(reg.test(tel)) {
          this.$store.dispatch('login')
          localStorage.setItem('userTel',tel)
          this.$router.go(-1)
        } else {
          e.preventDefault()
          this.$toast({
            message: '请输入正确格式的手机号',
            position: 'top'
          })
        }
      }
    }
  }
}
</script>

<style scoped>
  input {
    border:none;
    outline:none
  }
  .mint-header{
    font-size: 2rem;
    color: #737373;
    font-weight: 400;
    border-bottom: 2px solid #ed0b13;
    background-color: #fff;
  }
  .mint-button--primary{
    background-color: #fc3c60;
  }
  .login-container{
    width: 100%;
    margin-top: 3rem;
  }
  .login-input{
    padding-top: 2rem;
    padding-bottom: 1rem;
    width: 24rem;
    margin: 0 auto;
    border-bottom: 1px solid #dbdbdb;
  }
  .login-input .input-box {
    width: 100%;
    height: 4rem;
    line-height: 4rem;
    padding-left: 1rem;
    background-color: #fff;
    border-radius: 5px;
    margin-bottom: 2rem;
    border: 1px solid #d5d5d5;
    box-sizing: border-box;
  }
  .login-input .input-box input {
    width: 100%;
    font-size: 1.6rem;
  }
  .login-icons {
    width: 24rem;
    margin: 0 auto;
  }
  .login-icons p {
    font-size: 1.4rem;
    margin-top: 1rem;
    margin-bottom: 2rem;
    color: #737373;
  }
  .login-icons .icons {
    display: flex;
  }
  .login-icons .icon {
    width: 5rem;
    height: 5rem;
    display: block;
    border-radius: 50%;
    float: left;
    margin-right: 2rem;
    background-size:3rem 3rem;
    background-repeat: no-repeat;
    vertical-align: middle;
  }
  .login-icons .name {
    display: block;
    font-size: 1.4rem;
    line-height: 2;
  }
  .weibo {
    background: #fc3c60 url(../../assets/images/weibo.png)center center ;
  }
  .qq {
    background: #1578e8 url(../../assets/images/qq.png) center center;
  }
  .Copyright{
    clear:both;
    font-size: 1.2rem;
    /*padding: 3rem;*/
    color: #737373;
    text-align: center;
  }
  .regTxt {
    margin-top: 10px;
    font-size:14px;
    color:#666;
  }
  .fright {
    float:right;
  }
</style>
