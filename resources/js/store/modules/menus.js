export default{
    state: {
        menus:'',
        new_menu:'',
        menu_dishes:'',
    },
    getters: {
        allMenus(state){
            return state.menus
        },
        newMenu(state){
            return state.new_menu
        },
        newMenuDishes(state){
            return state.menu_dishes
        },
    },
    mutations: {
        updateMenus(state, menus){
            state.menus = menus
        },
        addingMenu(state, newMenu){
            state.menus.unshift(newMenu)
        },
        addingMenuDishes(state, newMenuDishes){
            //state.menu_dishes.unshift(newMenuDishes)
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
        async getNewMenuDishes(ctx, form){
            const new_menu_dishes = await axios.post('api/menus-dishes/store', form)
            ctx.commit('addingMenuDishes', new_menu_dishes.data)
            /*const menus = await axios.get('api/menus/')
            ctx.commit('updateMenus', menus.data)*/
        },
    },
}
