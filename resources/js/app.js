require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import login from '../vue/login.vue';
import donelogin from '../vue/donelogin.vue';
import recovery from '../vue/recovery.vue';
import recovery from '../vue/cringe.vue';

const routes = [
    {path: '/login1', component: login, name: 'login1'},
    {path: '/cringe', component: login, name: 'cringe'},
    {path: '/donelogin', component: donelogin, name: 'donelogin'},
    {path: '/recovery', component: recovery, name: 'recovery'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
