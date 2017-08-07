// PC端管理
import pc from '../pages/pc/Pc'
import clearCache from '../pages/pc/ClearCache'

export default {
  path: '/pc',
  component: pc,
  children: [
    { path: '', name: 'PcIndexClearCache', component: clearCache }
  ]
}
