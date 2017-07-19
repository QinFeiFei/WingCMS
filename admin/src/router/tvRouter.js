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
import pageTv from '../pages/tv/pageTv'

export default {
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
    { path: 'openclassList', name: 'OpenclassList', component: openclassList },
    { path: 'otherList', name: 'OtherList', component: otherList },
    // 专题管理
    { path: 'otherList', name: 'TvSpecial', component: tvSpecial },
    // 添加与删除
    { path: 'create/:type', name: 'TvCreate', component: pageTv },
    { path: 'update/:tv_id', name: 'TvUpdate', component: pageTv }
  ]
}
