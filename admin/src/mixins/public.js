import _ from 'lodash'

export default {
  data: function () {
    return {
      dataInfo: {},           // 单信息页面使用，如：新闻编辑
      dataList: [],           // 列表页面使用，如：新闻列表
      isLoading: false,       // 加载页面数据Loding,
      multipleSelection: [],  // 列表页面多选，选中项,

      current_page: 0,        // 当前页
      page_size: 10,           // 每页条数
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
    }
  }
}
