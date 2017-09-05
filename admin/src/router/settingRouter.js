// PC端管理
import setting from '../pages/setting/Setting'
import index from '../pages/setting/Index'
import emailTest from '../pages/setting/EmailTest'

export default {
  path: '/setting',
  component: setting,
  children: [
    { path: '', name: 'settingIndex', component: index },
    { path: 'email/test', name: 'settingEmailTest', component: emailTest }
  ]
}
