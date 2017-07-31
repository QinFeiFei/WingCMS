// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'

Vue.config.productionTip = false

// Axios
import axios from './http'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios)

// Iview UI
import iView from 'iview'
import 'iview/dist/styles/iview.css'
Vue.use(iView)

// public Mixin
import publicMixin from './mixins/public'
Vue.mixin(publicMixin)

// Iview 的table组件宽度不能自适应，暂时单独引入element-ui的table组件
import 'element-ui/lib/theme-default/index.css'
import {
  Table,
  TableColumn,
  Loading,
  Switch
} from 'element-ui'
Vue.use(Table)
Vue.use(TableColumn)
Vue.use(Loading)
Vue.use(Switch)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  template: '<App/>',
  components: { App }
})
