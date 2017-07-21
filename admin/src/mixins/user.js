import _ from 'lodash'
import registerTypes from '../config/userRegisterType'

export default {
  created: function () {
  },
  data: function () {
    return {
    }
  },
  computed: {
  },
  methods: {
    parseRegisterTypeText: function (type) {
      let index = _.findIndex(registerTypes, function (chr) {
        return chr.value === type
      })

      let text = (index === -1) ? '未知' : registerTypes[index].text
      return text
    }
  }
}
