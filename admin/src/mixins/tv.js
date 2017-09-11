import _ from 'lodash'
import langs from '../config/TvLangs'
import types from '../config/TvTypes'
import areas from '../config/TvAreas'
const [movie, teleplay, cartoon, variety, mv, openclass, other] = types
import { setField, destoryTv } from '../api/tv'

export default {
  created: function () {
    this.langs = langs
    this.types = types
    this.areas = areas

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
      types: [],
      areas: {},
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

    // 修改排序
    setSort: function (row) {
      row.sortEdit = false
      this.setField({
        tv_id: row.tv_id,
        field: 'tv_sort',
        value: row.tv_sort
      }, row)
    },

    // 修改是否推荐
    setPush: function (state, row) {
      this.axios({
        url: setField,
        method: 'POST',
        data: {
          tv_id: row.tv_id,
          field: 'is_push',
          value: state ? '1' : '0'
        }
      }).then(response => {
        let tmptxt = state === true ? '推荐' : '取消推荐'
        if (response.data.code === 0) {
          this.$Notice.success({
            title: '操作成功',
            desc: '《' + row.tv_name + '》 ' + tmptxt + '成功'
          })
        } else {
          this.$Notice.error({
            title: '操作失败',
            desc: '《' + row.tv_name + '》 ' + tmptxt + '失败,失败原因为:' + response.data.msg
          })
        }
      })
    },

    // 快速修改某字段的值
    setField: function (setData, row) {
      this.axios({
        url: setField,
        method: 'POST',
        data: setData
      }).then(response => {
        let fieldName = ''
        switch (setData.field) {
          case 'tv_baidu_url':
            fieldName = '百度分享URL'
            break
          case 'tv_baidu_pwd':
            fieldName = '百度分享密码'
            break
          case 'tv_sort':
            fieldName = '排序'
            break
        }

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

    // 将影视放入回收站
    deleteTv: function (row, index, rows) {
      this.$Modal.confirm({
        title: '确认删除',
        content: '确认将影视<b style="color:red">《' + row.tv_name + '》</b>放入回收站么？',
        loading: true,
        scrollable: false,
        onOk: function () {
          this.axios({
            url: destoryTv + row.tv_id,
            method: 'DELETE'
          }).then(response => {
            this.$Modal.remove()
            if (response.data.code === 0) {
              this.$Notice.success({
                title: '《' + row.tv_name + '》 删除成功'
              })

              rows.splice(index, 1)
              if (rows.length === 0) {
                window.location.reload()
              }
            } else {
              this.$Notice.error({
                title: '删除失败',
                desc: '《' + row.tv_name + '》删除失败，失败原因：' + response.data.msg
              })
            }
          })
        }
      })
    },

    // 根据影视类型(Tvtype:text=>value)转为数据库值
    parseTvTypeValue: function (type) {
      let index = _.findIndex(types, function (chr) {
        return chr.text === type
      })

      return (index === -1) ? types[0].value : types[index].value
    },

    // 根据影视类型(Tvtype:text=>value)转为数据库值
    parseTvTypeText: function (tvType) {
      let index = _.findIndex(types, function (chr) {
        return parseInt(chr.value) === parseInt(tvType)
      })

      return (index === -1) ? types[0].label : types[index].label
    },

    // 根据影视语言(TvLang:value=>text)转换为文字
    parseTvLangText: function (lang) {
      let index = _.findIndex(langs, function (chr) {
        return chr.value === lang
      })

      let text = (index === -1) ? '未知' : langs[index].label
      return text
    },

    // 根据影视地区(TvArea:value=>text)转换为文字
    parseTvAreaText: function (area, type) {
      let tmparea = areas[type]
      let index = _.findIndex(tmparea, function (chr) {
        return chr.value === area
      })

      let text = (index === -1) ? '未知' : tmparea[index].label
      return text
    }
  }
}
