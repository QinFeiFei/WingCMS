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
            { path: '/tv/', name: 'TvOverView', component: tvOverView },
            { path: '/tv/movieList', name: 'MovieList', component: movieList },
            { path: '/tv/teleplayList', name: 'TeleplayList', component: teleplayList },
            { path: '/tv/cartoonList', name: 'CartoonList', component: cartoonList },
            { path: '/tv/varietyList', name: 'VarietyList', component: varietyList },
            { path: '/tv/mvList', name: 'MvList', component: mvList },
            { path: '/tv/oenclassList', name: 'OpenclassList', component: openclassList },
            { path: '/tv/otherList', name: 'OtherList', component: otherList },
            // 专题管理
            { path: '/otherList', name: 'TvSpecial', component: tvSpecial }
          ]
        }
      ]
    }
  ]
})
