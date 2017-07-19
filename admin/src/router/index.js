import Vue from 'vue'
import Router from 'vue-router'
import Admin from '../components/Admin'
import PublicBody from '../pages/main/PublicBody'

import login from '../pages/login/Login'

// 控制台
import dashBoard from '../pages/main/Dashboard'

// 错误页面
import error404 from '../pages/error/404'
import error403 from '../pages/error/403'

// 用户管理
import user from '../pages/user/User'
import userList from '../pages/user/UserList'
import userPage from '../pages/user/UserPage'

// 文章管理
import article from '../pages/article/Article'
import articleList from '../pages/article/ArticleList'

// 影视管理
import tvRouter from '../router/tvRouter'

// Iview UI
import iView from 'iview'
import 'iview/dist/styles/iview.css'

Vue.use(Router)
Vue.use(iView)

// public Mixin
import publicMixin from '../mixins/public'
Vue.mixin(publicMixin)

// Iview 的table组件宽度不能自适应，暂时单独引入element-ui的table组件
import 'element-ui/lib/theme-default/index.css'
import {
  Table,
  TableColumn,
  Loading
} from 'element-ui'
Vue.use(Table)
Vue.use(TableColumn)
Vue.use(Loading)

export default new Router({
  routes: [
    {
      path: '/login',
      component: login,
      name: 'login'
    },
    {
      path: '/',
      component: Admin,
      children: [
        {
          path: '',
          name: 'dashBoard',
          component: dashBoard
        },
        {
          path: '/error',
          component: PublicBody,
          children: [
            { path: '', name: 'error', component: error404 },
            { path: '404', name: 'error404', component: error404 },
            { path: '403', name: 'error403', component: error403 }
          ]
        },
        {
          path: '/user',
          component: user,
          children: [
            { path: '/list', name: 'UserList', component: userList },
            { path: '/page', name: 'UserPage', component: userPage }
          ]
        },
        {
          path: '/article',
          component: article,
          children: [
            { path: '/list', name: 'ArticleList', component: articleList }
          ]
        },
        tvRouter
      ]
    }
  ]
})
