import axios from 'axios'
import Qs from 'qs'
import Cookies from 'js-cookie'

axios.defaults.paramsSerializer = function (params) {
  return Qs.stringify(params)
}

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.headers.common['Authorization'] = Cookies.get('token')

// http response 拦截器
axios.interceptors.response.use(
  response => {
    if (response.headers.authorization) {
      Cookies.set('token', response.headers.authorization)
    }

    return response
  },
  error => {
    if (error.response.data.error || error.response.status === 401) {
      window.location.href = '/#/login?' + encodeURIComponent(window.location.href)
      return false
    }
  })
export default axios
