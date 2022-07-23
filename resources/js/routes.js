import VueRouter from "vue-router";
import Vue from 'vue';
Vue.use(VueRouter);

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
import Register from './vue/auth/Register'


const router = new VueRouter({

    mode:'history',
    routes:[
        {
            path:"/login",
            component: Login,
            name: 'login',
            meta: {
                layout: 'Guest'
            }

        },
        {
            path:"/register",
            component: Register,
            name: 'register',
            meta: {
                layout: 'Guest'
            }

        },
        {
            path:"/cabinet",
            component: Cabinet,
            name: 'cabinet',
            meta: {
                layout: 'Auth'
            }

        },
        {
            path:"/chat-vuex",
            component: ChatVuex,
            meta: {
                layout: 'Auth'
            }

        },
        {
            path:"/dishes",
            component: Dishes,
            name: 'dishes',
            meta: {
                layout: 'Auth'
            }

        },
        {
            path:"/dropdown",
            component: Dropdown,
            meta: {
                layout: 'Auth'
            }

        },
        {
            path:"/test",
            component: Test,
            meta: {
                layout: 'Auth'
            }

        },
        {
            path:"/products",
            component: Products,
            name: 'products',
            meta: {
                layout: 'Auth'
            }

        },
        {
            path:"/menus-dishes",
            component: MenusDishes,
            name: 'menus-dishes',
            meta: {
                layout: 'Auth'
            }
        },
        {
            path:"/menus",
            component: Menus,
            name: 'menus',
            meta: {
                layout: 'Auth'
            }
        },
        {
            path:"/report",
            component: Report,
            name: 'report',
            meta: {
                layout: 'Auth'
            }
        },
    ]
});
router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token');
    if(!token){
        if(to.name === 'login' || to.name === 'register'){
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

