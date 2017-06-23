import Vue from 'vue'
import Router from 'vue-router'
import Admin from '../components/Admin'

// Iview UI
import iView from 'iview'
import 'iview/dist/styles/iview.css'

Vue.use(Router)
Vue.use(iView)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Admin',
      component: Admin
    }
  ]
})
