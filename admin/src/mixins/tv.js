import _ from 'lodash'
import langs from '../config/TvLangs'
import areas from '../config/TvAreas'
import types from '../config/TvTypes'
import classify from '../config/TvClassify'

export default {
  created: function () {
    this.langs = langs
    this.areas = areas
    this.types = types
    this.classify = classify
  },
  data: function () {
    return {
      langs: [],
      areas: [],
      types: [],
      classify: []
    }
  },
  computed: {
  },
  methods: {
    // 将影视类型转为数据库中的数值
    /*
    parseTvType: function (val) {
      let type = 0
      switch (val) {
        case 'movie': type = 10; break
      }
      return type
    },
    */

    // 将影视语言转换为文字
    parseTvLangText: function (lang) {
      let index = _.findIndex(langs, function (chr) {
        return chr.value === lang
      })

      let text = (index === -1) ? '未知' : langs[index].label
      return text
    },

    // 将
    parseTvAreaText: function (area) {
      let index = _.findIndex(areas, function (chr) {
        return chr.value === area
      })

      let text = (index === -1) ? '未知' : areas[index].label
      return text
    }
  }
}
