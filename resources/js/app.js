import Vue from 'vue'
import { TablePlugin, FormFilePlugin, PaginationPlugin, ModalPlugin, ToastPlugin } from 'bootstrap-vue'

import App from './App'
import { router } from './routes'
import setupAxios from "./axios";


Vue.use(TablePlugin)
Vue.use(FormFilePlugin)
Vue.use(PaginationPlugin)
Vue.use(ModalPlugin)
Vue.use(ToastPlugin)

const app = new Vue({
  el: '#app',
  router,
  components: { App }
});

setupAxios(app)


