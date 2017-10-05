import Vue from 'vue'
import App from './App'
import MintUI from 'mint-ui'
import 'mint-ui/lib/style.css'
require('swiper/dist/css/swiper.css')
import VueAwesomeSwiper from 'vue-awesome-swiper'
import router from './router'
import store from './store'
import axios from 'axios'
Vue.use(MintUI)
Vue.use(VueAwesomeSwiper)
Vue.config.productionTip = false
Vue.prototype.axios = axios
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  VueAwesomeSwiper,
  store,
  template: '<App/>',
  components: { App }
})
