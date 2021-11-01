require('./bootstrap');
window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router'
import routes from './routes'


import { library } from '@fortawesome/fontawesome-svg-core'
import { faPlusSquare, faTrash } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


//import App from './vue/app'

Vue.use(VueRouter)
library.add(faPlusSquare, faTrash)

Vue.component('font-awesome-icon', FontAwesomeIcon)

const app = new Vue({
    el:'#app',
    router: new VueRouter(routes)
    //components: { App }
});