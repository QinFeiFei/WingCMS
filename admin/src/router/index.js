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

// 文章管理
import article from '../pages/article/Article'
import articleList from '../pages/article/ArticleList'

// 用户管理
import userRouter from './userRouter'

// 影视管理
import tvRouter from './tvRouter'

// 首页管理
import pcRouter from './pcRouter'

import settingRouter from './settingRouter'

Vue.use(Router)
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
          path: '/article',
          component: article,
          children: [
            { path: '/list', name: 'ArticleList', component: articleList }
          ]
        },
        userRouter,
        tvRouter,
        pcRouter,
        settingRouter
      ]
    }
  ]
})
