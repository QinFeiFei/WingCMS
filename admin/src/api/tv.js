// 增
const tvStore = '/admin/tv'                 // 添加影视 POST
const tvUploadCover = '/admin/tv/uploadCover'  // 上传影视封面图片 POST
const tvClassStore = '/admin/tvClass'            // 添加影视分类 POST

// 查
const tvList = '/admin/tv'                  // 影视列表 GET
const tvShow = '/admin/tv/'                 // 显示单个影视 GET 参数：tv_id
const getTvClass = '/api/tv/getClass/'      // 查询对应影视类型的影视分类 GET 参数 tv_type
const tvClassList = '/admin/tvClass'       // 显示影视分类标签列表
const tvClassShow = '/admin/tvClass/'       // 显示影视分类标签列表 GET 参数 tv_class_id

// 改
const setField = '/admin/tv/setField'          // 设置单个字段值 POST
const tvUpdate = '/admin/tv/'                  // 修改影视 PATCH 参数：tv_id
const tvClassUpdate = '/admin/tvClass/'       // 修改影视分类标签 PATCH 参数：tv_class_id

// 删
const destoryTv = '/admin/tv/'              // 将影视移入回收站 DELETE 参数：tv_id
const deleteTv = '/admin/tv'                // 彻底删除影视(批量删除) DELETE
const tvClassDestory = '/admin/tvClass/'   // 删除影视分类标签 DELETE 参数：tv_class_id

// 求资源 | 资源异常
const tvSeekList = '/admin/tvseek'         // 求资源列表
const tvSeekDestory = '/admin/tvseek/'     // 删除求资源 DELETE 参数sk_id
const tvSeekHandle = '/admin/tvseek/'      // 求资源已处理 POST 参数sk_id
const tvFeedbackList = '/admin/tvfeedback' // 资源异常反馈列表
const tvFeedbackDestory = '/admin/tvfeedback/' // 资源异常反馈删除 DELETE 参数fb_id
const tvFeedbackHandle = '/admin/tvfeedback/'      // 资源异常反馈已处理 POST 参数fb_id

export {
  tvList,
  setField,
  tvStore,
  tvUpdate,
  tvShow,
  tvUploadCover,
  destoryTv,
  deleteTv,
  getTvClass,
  tvClassList,
  tvClassUpdate,
  tvClassDestory,
  tvClassShow,
  tvClassStore,
  tvSeekList,
  tvSeekDestory,
  tvFeedbackList,
  tvFeedbackDestory,
  tvSeekHandle,
  tvFeedbackHandle
}
