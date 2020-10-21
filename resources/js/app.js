require('./bootstrap')

window.Vue = require('vue')

import VueRouter from 'vue-router'
import { routes } from './routes'
Vue.use(VueRouter)
const router = new VueRouter({
  routes,
  mode: 'history',
})

import 'es6-promise/auto'
import Vuex from 'vuex'
import storeData from "./store/index"
Vue.use(Vuex)
// const debug = process.env.NODE_ENV !== 'production'
const store = new Vuex.Store(
  storeData
)

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.use(ElementUI)

import App from './App.vue'

const app = new Vue({
  el: '#app',
  components: {  },
  router,
  store,
  render: h => h(App),
})