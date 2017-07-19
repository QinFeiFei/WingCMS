const tvList = '/admin/tv'                  // 影视列表 GET
const setField = '/admin/setField'          // 设置单个字段值 POST
const tvStore = '/admin/tv'                 // 添加影视 POST
const tvUpdate = '/admin/tv/'               // 修改影视 PATCH 参数：tv_id
const tvShow = '/admin/tv/'                 // 显示单个影视 GET 参数：tv_id
const tvUploadCover = '/admin/uploadCover'  // 上传影视封面图片 POST

export {
  tvList,
  setField,
  tvStore,
  tvUpdate,
  tvShow,
  tvUploadCover
}
