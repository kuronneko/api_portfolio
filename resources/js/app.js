require('./bootstrap');

//import vue from 'vue';
//window.Vue = vue;

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faToggleOn,faToggleOff,faPenToSquare,faTrash,faDiagramProject,faWandSparkles } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faToggleOn,faToggleOff,faPenToSquare,faTrash,faDiagramProject,faWandSparkles)

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

createApp(App).use(router).use(VueAxios, axios).component('font-awesome-icon', FontAwesomeIcon).mount('#vapp');
