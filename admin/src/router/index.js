import Vue from 'vue'
import Router from 'vue-router'
import Admin from '../components/Admin'

// 控制台
import dashBoard from '../pages/main/Dashboard'

// 用户管理
import user from '../pages/user/User'
import userList from '../pages/user/UserList'
import userPage from '../pages/user/UserPage'

// 文章管理
import article from '../pages/article/Article'
import articleList from '../pages/article/ArticleList'

// Iview UI
import iView from 'iview'
import 'iview/dist/styles/iview.css'

Vue.use(Router)
Vue.use(iView)

export default new Router({
  routes: [
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
          path: '/user',
          name: 'user',
          component: user,
          children: [
            { path: '/list', name: 'UserList', component: userList },
            { path: '/page', name: 'UserPage', component: userPage }
          ]
        },
        {
          path: '/article',
          name: 'article',
          component: article,
          children: [
            { path: '/list', name: 'ArticleList', component: articleList }
          ]
        }
      ]
    }
  ]
})
