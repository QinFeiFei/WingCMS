import _ from 'lodash'
import dateUtil from 'iview/src/utils/date'

export default {
  data: function () {
    return {
      dataInfo: {},           // 单信息页面使用，如：新闻编辑
      dataList: [],           // 列表页面使用，如：新闻列表
      isLoading: false,       // 加载页面数据Loding,
      multipleSelection: [],  // 列表页面多选，选中项,

      current_page: 0,        // 当前页
      page_size: 20,           // 每页条数
      list_count: 0            // 数据总条数
    }
  },
  methods: {
    // 列表页某一列是否显示
    displayColumns: function (showColumns, key) {
      let index = _.findIndex(showColumns, function (chr) {
        return chr.column === key
      })
      return showColumns[index].show
    },

    // 列表页修改页数
    changePage: function (page) {
      this.current_page = page
      this.loadData()
    },

    // 列表页修改每页条数
    changePageSize: function (pageSize) {
      this.page_size = pageSize
      this.loadData()
    },

    // 列表页全选操作
    handleSelectionChange: function (val) {
      this.multipleSelection = val
    },

    // 列表页显示设置显示列的弹层
    showTableColumns: function () {
      this.$store.commit('ToggleColumnsShow')
    },

    // 列表页组装查询条件
    parseParam: function (searchFields) {
      let params_ = {
        page: this.current_page,
        page_size: this.page_size
      }
      for (let item of searchFields) {
        if (item.type === 'time' && item.search && item.search.length === 2) {
          if (item.search[0] === null || item.search[1] === null) {
            continue
          }
          item.search[0] = dateUtil.format(item.search[0], 'yyyy-MM-dd HH:mm:ss')
          item.search[1] = dateUtil.format(item.search[1], 'yyyy-MM-dd HH:mm:ss')
        }
        _.set(params_, item.field, item.search)
      }

      return params_
    }
  }
}
