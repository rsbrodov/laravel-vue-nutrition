export default{
    state: {
        posts: ''
    },
    getters: {
        allPosts(state){
            return state.posts
        },
        countPosts(state){
            return state.posts.length
        }
    },
    mutations: {
        updatePosts(state, posts){
            state.posts = posts
        },
        addingPost(state, newPost){
            state.posts.unshift(newPost)
        }
    },
    actions: {
        async getList(ctx){
            const posts = await axios.get('api/chats')
            ctx.commit('updatePosts', posts.data)
        },
        async newMessage(ctx, message){
            const new_post = await axios.post('api/chat/store', message)
            ctx.commit('addingPost', new_post.data)
        },
    },
}