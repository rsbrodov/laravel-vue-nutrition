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
export default{

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

        },
        {
            path:"/chat-vuex",
            component: ChatVuex,

        },
        {
            path:"/dishes",
            component: Dishes,

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

        },
    ]
}
