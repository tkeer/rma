import VueRouter from "vue-router";
import Vue from 'vue'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: "/",
            component: Layout,
            children: [
                ...clients,
                ...franchisees,
                ...categories,
                {
                    path: '/change/password',
                    name: 'change.password',
                    component: ChangePassword
                }
            ]
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/reset/request',
            name: 'reset.request',
            component: Request
        },
        {
            path: '/reset/password/:token',
            name: 'reset.password',
            component: Reset
        },
        {
            path: '/upload/:token/:clientId?',
            name: 'upload',
            component: Upload
        },
    ],
});

export { router }
