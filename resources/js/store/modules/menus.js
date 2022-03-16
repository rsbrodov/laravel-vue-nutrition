export default{
    state: {
        menus:'',
        new_menu:'',
    },
    getters: {
        allMenus(state){
            return state.menus
        },
        newMenu(state){
            return state.new_menu
        },
    },
    mutations: {
        updateMenus(state, menus){
            state.menus = menus
        },
        addingMenu(state, newMenu){
            state.menus.unshift(newMenu)
        },
    },
    actions: {
        async getMenus(ctx){
            const menus = await axios.get('api/menus/')
            ctx.commit('updateMenus', menus.data)
        },
        async getNewMenu(ctx, form){
            const new_menu = await axios.post('api/menus/store', form)
            ctx.commit('addingMenu', new_menu.data)
            const menus = await axios.get('api/menus/')
            ctx.commit('updateMenus', menus.data)
        },
        async deleteMenu(ctx, id){
            await axios.delete('api/menus/'+id)
            const menus = await axios.get('api/menus/')
            ctx.commit('updateMenus', menus.data)
        },
    },
}
