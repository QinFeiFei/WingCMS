import _ from 'lodash'

export default {
  data: function () {
    return {
      dataInfo: {},           // 单信息页面使用，如：新闻编辑
      dataList: [],           // 列表页面使用，如：新闻列表
      isLoading: false,       // 加载页面数据Loding,
      multipleSelection: []   // 列表页面多选，选中项
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

    // sss
    handleSelectionChange: function (val) {
      this.multipleSelection = val
    }
  }
}
