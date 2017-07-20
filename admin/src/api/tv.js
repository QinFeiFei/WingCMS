// 增
const tvStore = '/admin/tv'                 // 添加影视 POST
const tvUploadCover = '/admin/tv/uploadCover'  // 上传影视封面图片 POST

// 查
const tvList = '/admin/tv'                  // 影视列表 GET
const tvShow = '/admin/tv/'                 // 显示单个影视 GET 参数：tv_id

// 改
const setField = '/admin/tv/setField'          // 设置单个字段值 POST
const tvUpdate = '/admin/tv/'               // 修改影视 PATCH 参数：tv_id

// 删
const destoryTv = '/admin/tv/'              // 将影视移入回收站 DELETE 参数：tv_id
const deleteTv = '/admin/tv'                // 彻底删除影视(批量删除) DELETE

export {
  tvList,
  setField,
  tvStore,
  tvUpdate,
  tvShow,
  tvUploadCover,
  destoryTv,
  deleteTv
}
