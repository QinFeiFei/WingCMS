import _ from 'lodash'
import langs from '../config/TvLangs'
import areas from '../config/TvAreas'
import classify from '../config/TvClassify'
import types from '../config/TvTypes'
const [movie, teleplay, cartoon, variety, mv, openclass, other] = types
import { setField } from '../api/tv'

export default {
  created: function () {
    this.langs = langs
    this.areas = areas
    this.types = types
    this.classify = classify

    this.movie = movie
    this.teleplay = teleplay
    this.cartoon = cartoon
    this.variety = variety
    this.mv = mv
    this.openclass = openclass
    this.other = other
  },
  data: function () {
    return {
      langs: [],
      areas: [],
      types: [],
      classify: [],

      movie: {},
      teleplay: {},
      cartoon: {},
      variety: {},
      mv: {},
      openclass: {},
      other: {}
    }
  },
  computed: {
  },
  methods: {
    // 修改百度分享密码
    setPass: function (row) {
      row.passEdit = false
      this.setField({
        tv_id: row.tv_id,
        field: 'tv_baidu_pwd',
        value: row.tv_baidu_pwd
      }, row)
    },

    // 修改百度分享链接
    setUrl: function (row) {
      row.urlEdit = false
      this.setField({
        tv_id: row.tv_id,
        field: 'tv_baidu_url',
        value: row.tv_baidu_url
      }, row)
    },

    // 快速修改某字段的值
    setField: function (setData, row) {
      this.axios({
        url: setField,
        method: 'POST',
        data: setData
      }).then(response => {
        let fieldName = setData.field === 'tv_baidu_url' ? '百度分享URL' : '百度分享密码'
        if (response.data.code === 0) {
          this.$Notice.success({
            title: fieldName + ' 更新成功',
            desc: '《' + row.tv_name + '》 的字段' + fieldName + '更新成功,更新后的值为:' + setData.value
          })
        } else {
          this.$Notice.error({
            title: fieldName + ' 更新失败',
            desc: '《' + row.tv_name + '》 的字段' + fieldName + '更新失败,失败原因为:' + response.data.msg
          })
        }
      })
    },

    // 删除影视
    delete: function (row) {
      this.deleteModal = true
    },

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
