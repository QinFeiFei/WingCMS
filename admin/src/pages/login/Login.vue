<template>
  <div class="page-login">
    <div class="page-brand-info">
      <div class="page-brand">
        <div class="brand-login"></div>
        <div class="brand-name"></div>
        <p></p>
        <p></p>
        <p></p>
        <div class="btn-line"></div>
      </div>
    </div>
    <div class="page-login-main">

    </div>
  </div>
</template>

<style scoped>
  @import "../../assets/css/reset.css";
  .page-login {
    z-index:-2;
    position:absolute;
    width:100%;
    top:0px;
    bottom:0px;
    background-image: url(../../assets/images/login.jpg);
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

</style>
