import VueRouter from "vue-router";
import Vue from 'vue';
Vue.use(VueRouter);

import App from './vue/todolist/app'
import Chat from './vue/chat/chat'
import Register from './vue/auth/Register'
import Login from './vue/auth/Login'
import Cabinet from './vue/auth/Cabinet'
import ChatVuex from './vue/chat/chatVuex'
import Dishes from './vue/dishes/Dishes'
import Dropdown from './vue/test/Dropdown'
import Test from './vue/auth/Test'
import Products from './vue/products/Products'
import Menus from './vue/menus/Menus'
import MenusDishes from './vue/menus-dishes/Index'
import Report from './vue/menus-dishes/Report'


const router = new VueRouter({

    mode:'history',
    routes:[
        {
            path:'/todolist',
            component: App,
        },
        {
            path:"/chat",
            component: Chat
        },
        {
            path:"/register",
            component: Register,
            name: 'register'

        },
        {
            path:"/login",
            component: Login,
            name: 'login'

        },
        {
            path:"/cabinet",
            component: Cabinet,
            name: 'cabinet'

        },
        {
            path:"/chat-vuex",
            component: ChatVuex,

        },
        {
            path:"/dishes",
            component: Dishes,
            name: 'dishes'

        },
        {
            path:"/dropdown",
            component: Dropdown,

        },
        {
            path:"/test",
            component: Test,

        },
        {
            path:"/products",
            component: Products,
            name: 'products'

        },
        {
            path:"/menus-dishes",
            component: MenusDishes,
            name: 'menus-dishes'
        },
        {
            path:"/menus",
            component: Menus,
            name: 'menus'
        },
        {
            path:"/report",
            component: Report,
            name: 'report'
        },
    ]
});
router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token');
    if(!token){
        if(to.name === 'login'){
            return next();
        }else{
            return next({name:"login"})
        }
    }else{
        if(to.name === 'login') {
            return next({name: "cabinet"});
        }else{
            return next();
        }
    }
    return next();
});
export default router

