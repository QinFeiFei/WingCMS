// 增
const userStore = '/admin/user'                 // 添加会员 POST
const userUploadAvatar = '/admin/user/uploadAvatar'  // 上传会员头像图片 POST

// 查
const userList = '/admin/user'                  // 会员列表 GET
const userShow = '/admin/user/'                 // 显示单个会员 GET 参数：user_id

// 改
const userUpdate = '/admin/user/'               // 修改会员 PATCH 参数：user_id

// 删
const destoryUser = '/admin/user/'              // 将会员移入回收站 DELETE 参数：user_id
const deleteUser = '/admin/user'                // 彻底删除会员(批量删除) DELETE

export {
  userStore,
  userShow,
  userUpdate,
  userList,
  userUploadAvatar,
  destoryUser,
  deleteUser
}
