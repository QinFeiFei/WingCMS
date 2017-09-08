// PC端管理
import pc from '../pages/pc/Pc'
import clearCache from '../pages/pc/ClearCache'

// Banner管理
import bannerPage from '../pages/pc/BannerPage'
import bannerList from '../pages/pc/BannerList'

export default {
  path: '/pc',
  component: pc,
  children: [
    { path: '', name: 'PcIndexClearCache', component: clearCache },
    { path: 'banner', name: 'bannerList', component: bannerList },
    { path: 'banner/create', name: 'bannerCreate', component: bannerPage },
    { path: 'banner/update/:banner_id', name: 'bannerUpdate', component: bannerPage }
  ]
}
