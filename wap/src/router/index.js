import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/pages/index/index'
import Phone from '@/pages/phone/phone'
import Goods from '@/pages/good/goods'
import Services from '@/pages/service/services'
import Login from '@/pages/user/login'
import Cart from '@/pages/cart/cart'
import Club from '@/pages/club/club'
import Detail from '@/pages/good/detail'
import List1 from '@/pages/good/list1'
import List2 from '@/pages/good/list2'
import List3 from '@/pages/good/list3'
import List4 from '@/pages/good/list4'
import ListError from '@/pages/good/listError'
import User from '@/pages/user/user'
import CheckOrder from '@/pages/cart/checkorder'
import Payment from '@/pages/cart/payment'
import Address from '@/pages/cart/address'
import Search from '@/pages/public/search'
import PhoneInfo from '@/pages/phone/phoneInfo'
import Rush from '@/pages/phone/rush'
import Myorder from '@/pages/order/myorder'
import Allorder from '@/pages/order/allorder'
import Notpaid from '@/pages/order/notPaid'
import Delivered from '@/pages/order/delivered'
import Success from '@/pages/order/success'
import Summary from '@/pages/phone/summary'
import Photo from '@/pages/phone/photo'
import Param from '@/pages/phone/param'
import Book from '@/pages/phone/book'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: Index
    },
    {
      path: '/phone',
      component: Phone
    },
    {
      path: '/goods',
      component: Goods,
      children: [
        {
          path: '/lists',
          component: List1
        },
        {
          path: '/list2',
          component: List2
        },
        {
          path: '/list3',
          component: List3
        },
        {
          path: '/listError',
          component: ListError
        },
        {
          path: '/list4',
          component: List4
        }
      ]
    },
    {
      path: '/services',
      component: Services
    },
    {
      path: '/login',
      component: Login
    },
    {
      path: '/cart',
      component: Cart
    },
    {
      path: '/club',
      component: Club
    },
    {
      path: '/detail',
      component: Detail
    },
    {
      path: '/user',
      component: User
    },
    {
      path: '/checkorder',
      component: CheckOrder
    },
    {
      path: '/payment',
      component: Payment
    },
    {
      path: '/address',
      component: Address
    },
    {
      path: '/search',
      component: Search
    },
    {
      path: '/phoneInfo',
      component: PhoneInfo,
      children: [
        {
          path: '/summary',
          component: Summary
        },
        {
          path: '/photo',
          component: Photo
        },
        {
          path: '/param',
          component: Param
        }
      ]
    },
    {
      path: '/rush',
      component: Rush
    },
    {
      path: '/myorder',
      component: Myorder,
      children: [
        {
          path: '/allorder',
          component: Allorder
        },
        {
          path: '/notPaid',
          component: Notpaid
        },
        {
          path: '/delivered',
          component: Delivered
        },
        {
          path: '/success',
          component: Success
        }
      ]
    },
    {
      path: '/book',
      component: Book
    }
  ]
})
