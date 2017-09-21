import Vue from 'vue'
import Router from 'vue-router'

// 首页
import Index from '../pages/index/index'

// 登陆 / 注册 / 找回密码
import Login from '../pages/user/login'
import Register from '../pages/user/register'
import FindPwd from '../pages/user/findpwd'

// 详情页 / 列表页 / 搜索
import Detail from '../pages/tv/detail'
import List from '../pages/tv/list'
import Search from '../pages/public/search'

// 用户中心
import User from '../pages/user/user'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: Index
    },
    {
      path: '/login',
      component: Login
    },
    {
      path: '/register',
      component: Register
    },
    {
      path: '/findpwd',
      component: FindPwd
    },
    {
      path: '/detail',
      component: Detail
    },
    {
      path: '/list',
      component: List
    },
    {
      path: '/user',
      component: User
    },
    {
      path: '/search',
      component: Search
    }
  ]
})
