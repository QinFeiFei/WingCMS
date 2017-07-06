import Vue from 'vue'
import Router from 'vue-router'
import Admin from '../components/Admin'
import PublicBody from '../pages/main/PublicBody'

// 控制台
import dashBoard from '../pages/main/Dashboard'

// 错误页面
import error404 from '../pages/error/404'
import error401 from '../pages/error/401'

// 用户管理
import user from '../pages/user/User'
import userList from '../pages/user/UserList'
import userPage from '../pages/user/UserPage'

// 文章管理
import article from '../pages/article/Article'
import articleList from '../pages/article/ArticleList'

// 影视管理
import tv from '../pages/tv/Tv'
import tvOverView from '../pages/tv/TvOverView'
import movieList from '../pages/tv/MovieList'
import teleplayList from '../pages/tv/TeleplayList'
import cartoonList from '../pages/tv/CartoonList'
import varietyList from '../pages/tv/VarietyList'
import mvList from '../pages/tv/MvList'
import openclassList from '../pages/tv/OpenclassList'
import otherList from '../pages/tv/OtherList'
import tvSpecial from '../pages/tv/TvSpecial'
import createTv from '../pages/tv/CreateTv'

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
            { path: '401', name: 'error401', component: error401 }
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
        {
          path: '/tv',
          component: tv,
          children: [
            // 资源管理
            { path: '', name: 'TvOverView', component: tvOverView },
            { path: 'movieList', name: 'MovieList', component: movieList },
            { path: 'teleplayList', name: 'TeleplayList', component: teleplayList },
            { path: 'cartoonList', name: 'CartoonList', component: cartoonList },
            { path: 'varietyList', name: 'VarietyList', component: varietyList },
            { path: 'mvList', name: 'MvList', component: mvList },
            { path: 'oenclassList', name: 'OpenclassList', component: openclassList },
            { path: 'otherList', name: 'OtherList', component: otherList },
            // 专题管理
            { path: 'otherList', name: 'TvSpecial', component: tvSpecial },
            // 添加与删除
            { path: 'create', name: 'TvCreate', component: createTv },
            { path: 'update', name: 'TvUpdate', component: createTv }
          ]
        }
      ]
    }
  ]
})
