<template>
  <div class="page-login">
    <div class="page-brand-info hidden-xs">
      <div class="page-brand">
        <div class="brand-logo">
          <img src="../../assets/images/logo.svg" height="50" alt="WingCMS">
          <p class="logo-text">WingCMS</p>
        </div>
        <div class="brand-name hidden-sm">
          WingCms - 优雅通用的CMS管理系统快速开发框架
        </div>
        <p class="brand-spec hidden-sm"><Icon type="arrow-right-b"></Icon> WingCMS 是一个基于最新 Web 技术的企业级通用CMS管理系统快速开发框架，可以帮助个人或企业极大的提高生产效率，节省开发成本。</p>
        <p class="brand-spec hidden-sm"><Icon type="arrow-right-b"></Icon> 您可以 WingCMS 功能为基础，快速开发各种系统，如新闻网站、个人博客、企业官网等。</p>
        <p class="brand-spec hidden-sm"><Icon type="arrow-right-b"></Icon> Admui 使用前后端分离开发，后端使用Laravel框架，前端采用模块化Vue框架。</p>
        <div class="btn-line hidden-sm">
          <Button type="primary" icon="home">返回官网</Button>
          <a href="https://github.com/qinfeifei" target="_blank"><Button type="success" icon="social-github">GitHub</Button></a>
          <Button type="warning" icon="person">联系客服</Button>
        </div>
      </div>
    </div>
    <Form class="page-login-main" ref="formFields" :model="formFields">
      <div class="vertical-align">
        <div class="vertical-align-middle">
          <img src="../../assets/images/logo.svg" class="alignLogo" height="50" alt="WingCMS" />
          <h1>登陆WingCMS</h1>
          <p class="mb50">All good things begin with "Login"</p>

          <Alert v-if="error !== ''" type="error" show-icon>{{ error }}</Alert>
          <Input class="login-input" size="large" v-model="formFields.username" placeholder="username" required />
          <Input class="login-input" size="large" v-model="formFields.password" placeholder="password" type="password" required />
          <p>
            <Checkbox v-model="formFields.remember">自动登陆</Checkbox>
            <a href="" class="fright">注册帐号</a>
            <span class="fright">&nbsp;·&nbsp;</span>
            <a href="" class="fright">找回密码</a>
          </p>
          <Button v-loading="isLoading" class="mt20" size="large" type="info" long @click="login">Login In</Button>
        </div>
        <p class="copyright">太原科技公司 © <a href="http://www.wagcc.com" target="_blank">wagcc.com</a></p>
      </div>
    </Form>
  </div>
</template>

<script type="text/ecmascript-6">
  import { loginUrl } from '../../api/main'
  export default {
    data: function () {
      return {
        formFields: {
          username: '',
          password: '',
          remember: false
        },
        error: ''
      }
    },
    methods: {
      valid: function () {
        if (this.formFields.username === '') {
          this.error = 'The Input username is empty!'
          return false
        }
        if (this.formFields.password === '') {
          this.error = 'The Input password is empty!'
          return false
        }
        return true
      },
      login: function () {
        if (this.valid()) {
          this.isLoading = true
          this.axios({
            url: loginUrl,
            method: 'POST',
            data: {
              admin_name: this.formFields.username,
              password: this.formFields.password,
              remember: this.formFields.remember
            }
          }).then(response => {
            this.isLoading = false
            if (response.data.code !== 0) {
              this.$Message.error(response.data.msg)
            } else {
              localStorage.setItem('token', response.data.result.token)
              window.location.href = '/'
              this.$Message.success('登陆成功')
            }
          })
        }
      }
    },
    watch: {
      formFields: {
        handler: function (val, old) {
          if (val.username !== '' && val.password !== '') {
            this.error = ''
          }
        },
        deep: true
      }
    }
  }
</script>

<style scoped>
  @import "../../assets/css/reset.css";
  .page-login {
    z-index:-2;
    position:absolute;
    width:100%;
    top:0px;
    bottom:0px;
    background-image: url(../../assets/images/login_bg1.jpg);
    padding: 20px 20px;
    padding-right: 500px;
  }
  .page-login:after {
    z-index: -1;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    content: "";
    background-color: rgba(38,50,56,.6);
  }
  .page-brand-info {
    height: 100%;
    animation-duration: .5s;
    animation-timing-function: ease-out;
  }
  .page-brand-info:before {
    display: inline-block;
    height: 100%;
    vertical-align: middle;
    content: "";
    box-sizing: border-box;
  }
  .page-brand-info .page-brand {
    z-index: 111;
    color:#fff;
    padding: 0 60px 60px;
    vertical-align: middle;
    display: inline-block;
    max-width: 100%;
    font-size: 14px;
    line-height: 1.6;
    box-sizing: border-box;
  }
  .brand-spec {
    line-height:30px;
  }
  .brand-logo {
    position:relative;
  }
  .brand-logo p {
    text-shadow: 0px 0px 10px #000;
    position:absolute;
    top:-7px;
    left:60px;
    font-size:35px;
  }
  .brand-name {
    font-size:18px;
    margin-top:5px;
    margin-bottom:15px;
  }
  .btn-line {
    margin-top:20px;
  }

  .page-login-main {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    padding: 0 60px;
    color: #76838f;
    background: #fff;
  }

  .vertical-align {
    position: relative;
    height:100%;
  }

  .vertical-align .copyright {
    text-align: center;
    position:absolute;
    bottom:30px;
    width:100%;
  }

  .vertical-align:before {
    display: inline-block;
    height: 100%;
    vertical-align: middle;
    content: "";
  }

  .vertical-align-middle {
    vertical-align: middle;
    display: inline-block;
    max-width: 100%;
    font-size: 14px;
    margin-bottom: 180px;
  }

  .alignLogo {
    display:none;
    margin:0 auto;
    margin-bottom:20px !important;
  }
  .page-login-main h1 {
    font-size:22px;
    color:#444;
    margin-bottom:5px;
  }

  .page-login-main .login-input {
    margin-bottom:10px;
  }

  .mb50 {
    margin-bottom:50px;
  }

  @media (min-width:768px) and (max-width:991px){
    .hidden-sm {
      display: none !important;
    }
  }

  @media (max-width:767px) {
    .page-login {
      padding-left:10px;
    }
    .hidden-sm {
      display: none !important;
    }


    .page-brand-info .page-brand {
      padding: 0px;
    }
    .brand-logo img {
      width:100%;
    }
    .logo-text {
      position:relative !important;
      top:0px !important;
      left:0px !important;
      width:100%;
      display:block;
      text-align:center;
      font-size:25px !important;
    }
  }

  @media (max-width: 675px) {
    .hidden-xs {
      display: none !important;
    }

    .alignLogo {
      display:block !important;
    }

    .page-login-main, .vertical-align-middle{
      width:100%;
    }

    .vertical-align-middle h1,.mb50 {
      text-align: center !important;
    }

    .vertical-align-middle {
      margin-bottom: 0px !important;
    }
  }

  @media (max-width: 500px) {
    .page-login {
      padding:0px;
    }
    .page-login-main {
      padding:0 20px;
    }
    .hidden-ssm {
      display:block !important;
    }
  }


</style>
