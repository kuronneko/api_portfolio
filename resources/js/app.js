require('./bootstrap');
//import vue from 'vue';
//window.Vue = vue;

import { createApp } from 'vue';
import App from './components/App.vue';

//importamos Axios
import VueAxios from 'vue-axios';
import axios from 'axios';


import * as VueRouter from 'vue-router';
import { routes } from './routes';

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
  });

createApp(App).use(router).use(VueAxios, axios).mount('#vapp');
