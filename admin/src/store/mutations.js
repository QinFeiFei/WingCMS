const mutations = {
  // 列表页->设置要显示的字段弹层（是否显示）
  ToggleColumnsShow (state) {
    state.columnsShow = !state.columnsShow
  }
}
export default mutations
