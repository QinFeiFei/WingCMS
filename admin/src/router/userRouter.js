// 用户路由
import user from '../pages/user/User'
import userList from '../pages/user/UserList'
import userPage from '../pages/user/UserPage'

export default {
  path: '/user',
  component: user,
  children: [
    { path: '', name: 'UserList', component: userList },
    { path: '/page', name: 'UserPage', component: userPage }
  ]
}
