import axios from 'axios'
import Qs from 'qs'

import { loginUrl } from './api/main'

axios.defaults.paramsSerializer = function (params) {
  return Qs.stringify(params)
}

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.token

// http response 拦截器
axios.interceptors.response.use(
  response => {
    return response
  },
  error => {
    if (error.response.data.error || error.response.status === '401') {
      window.location.href = loginUrl + encodeURIComponent(window.location.href)
      return false
    }
  })
export default axios
