<template>
  <div class="footer">
    <div class="links">
      <router-link to='' class="link">关于我们</router-link>
      <span class="sep">|</span>
      <router-link to='' class="link">联系方式</router-link>
      <span class="sep">|</span>
      <router-link to='' class="link">微信公众号</router-link>
      <span class="sep">|</span>
      <router-link to='' class="link">访问电脑版</router-link>
    </div>
    <p class="copyrights">
      © 2017&nbsp;icxtv.com&nbsp;版权所有<br />
      <span style="color:red;display:block;width:80%;margin:0 auto;text-align:center;">如有内容侵犯您的合法权益，请及时与我们联系，我们将第一时间安排核实及删除！</span>
    </p>
  </div>
</template>

<script>
export default {
}
</script>

<style scoped>
.footer {
  clear: both;
  width: 100%;
  height: 18rem;
}
.links{
  text-align: center;
  padding-top: 3rem;
  margin: 1rem;
}
.links .link{
  font-size: 1.4rem;
  color: #6a6a6a;
}
.footer .copyrights,.footer .copyrights a {
    color: #a2a2a2;
    font-size: 1.2rem;
    margin: 0 auto;
    line-height: 2rem;
    padding-bottom:2rem;
    text-align: center;
}
</style>
