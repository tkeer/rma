import VueRouter from "vue-router";
import Vue from 'vue'

Vue.use(VueRouter)

import Layout from '../components/Layout'
import pdfs from "./pdfs"
import snippets from "./snippets"
import links from "./links"

const router = new VueRouter({
  // linkExactActiveClass: "active",
  routes: [
    {
      path: '',
      component: Layout,
      children: [
        ...pdfs,
        ...snippets,
        ...links,
      ]
    }
  ]
});

export { router }
