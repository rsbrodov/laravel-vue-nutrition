require('./bootstrap');
window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router'
import routes from './routes'
import BootstrapVue from 'bootstrap-vue'
import Vuelidate from 'vuelidate'

import { library } from '@fortawesome/fontawesome-svg-core'
import { faCopy, faPencilAlt, faPlusSquare, faTrash } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

//import vHeader from './Headers'
import store from './store/index'
Vue.component('v-header', require('./Headers.vue').default);
Vue.component('v-footer', require('./Footer.vue').default);
//import App from './vue/app'

import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap-vue/dist/bootstrap-vue.css"
//import "import '@/resources/css/app.css"

Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.use(Vuelidate)
library.add(faPlusSquare, faTrash, faPencilAlt, faCopy)

Vue.component('font-awesome-icon', FontAwesomeIcon)

const app = new Vue({
    el:'#app',
    router: new VueRouter(routes),
    store,

    //components: { App }
});
