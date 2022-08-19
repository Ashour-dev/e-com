window.axios=require('axios');
// window.axios.defaults.headers.common['X-Reuested-With']='XMLHttpRequest';
window.Vue = require('vue');


import Vue from "vue";
import VueRouter from "vue-router";
import App from "./views/App";

Vue.use(VueRouter);

import Home from './pages/Home';
import Show from './pages/Show';

const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path:'/',
            name:'Home',
            component:Home
        },
        {
            path:'/product/:id',
            name:'Show',
            component:Show
        },
]
})

const app = new Vue({
    el: '#root',
    render: h=>h(App),
    router,
});
