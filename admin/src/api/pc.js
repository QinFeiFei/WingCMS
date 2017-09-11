const clearCache = '/admin/pc/clearCache'

// Banner管理
const bannerList = '/admin/banner'        // get
const bannerCreate = '/admin/banner'      // post
const bannerUpdate = '/admin/banner/'     // patch  参数banner_id
const bannerShow = '/admin/banner/'       // get 参数banner_id
const bannerDestory = '/admin/banner/'    // delete 参数banner_id
const bannerUpload = '/admin/banner/upload'

export {
  clearCache,
  bannerList,
  bannerCreate,
  bannerUpdate,
  bannerShow,
  bannerDestory,
  bannerUpload
}
