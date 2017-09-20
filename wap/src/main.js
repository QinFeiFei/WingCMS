import Vue from 'vue'
import App from './App'
import MintUI from 'mint-ui'
import 'mint-ui/lib/style.css'
require('swiper/dist/css/swiper.css')
import VueAwesomeSwiper from 'vue-awesome-swiper'
import RegionPicker from 'vue-region-picker'
import CHINA_REGION from 'china-area-data'
import router from './router'
import store from './store'
import axios from 'axios'
Vue.use(MintUI)
Vue.use(VueAwesomeSwiper)
Vue.use(RegionPicker, {
  region: CHINA_REGION,
  vueVersion: 2
})
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
