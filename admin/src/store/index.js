import Vue from 'vue'
import Vuex from 'vuex'

// 全局 Vuex
import state from './state'
import getters from './getters'
import actions from './actions'
import mutations from './mutations'

// 模块 store
import tv from './modules/tv'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    tv
  },
  state,
  getters,
  actions,
  mutations
})

export default store
