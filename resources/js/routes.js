import App from './vue/app'
import Chat from './vue/chat'
export default{

    mode:'history',
    routes:[
        {
            path:'/todolist',
            component: App
        },
        {
            path:"/chat",
            component: Chat
        }
    ]
}