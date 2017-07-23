// 用户路由
import user from '../pages/user/User'
import userList from '../pages/user/UserList'
import userPage from '../pages/user/UserPage'
import userShow from '../pages/user/UserShow'

export default {
  path: '/user',
  component: user,
  children: [
    { path: '', name: 'UserList', component: userList },
    { path: 'create', name: 'UserCreate', component: userPage },
    { path: 'update/:user_id', name: 'UserUpdate', component: userPage },
    { path: 'show/:user_id', name: 'UserShow', component: userShow }
  ]
}
