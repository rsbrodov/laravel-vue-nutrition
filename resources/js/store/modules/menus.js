export default{
    state: {
        menus:[],
        new_menu:'',
        new_menu_dishes:'',
        menus_dishes:'',
        first_menu:'',
    },
    getters: {
        allMenus(state){
            return state.menus
        },
        newMenu(state){
            return state.new_menu
        },
        newMenuDishes(state){
            return state.new_menu_dishes
        },
        menusDishes(state){
            return state.menus_dishes
        },
        firstMenu(state){
            return state.first_menu
        },
    },
    mutations: {
        updateMenus(state, menus){
            state.menus = menus
        },
        firstMenu(state, first_menu){
            state.first_menu = first_menu
        },
        addingMenu(state, newMenu){
            state.menus.unshift(newMenu)
        },
        updateMenusDishes(state, menus_dishes){
            state.menus_dishes = menus_dishes
        },
        addingMenusDishes(state, newMenuDishes){
            state.menus_dishes.unshift(newMenuDishes)
        },
    },
    actions: {
        async getMenus({commit}){
            const menus = await axios.get('api/v1/menus/');
            commit('updateMenus', menus.data)
        },
        async getFirstMenu({commit}){
            const first_menu = await axios.get('api/v1/menus/first-menu/');
            commit('firstMenu', first_menu.data)
        },
        async getNewMenu(ctx, form){
            const new_menu = await axios.post('api/v1/menus/store', form);
            ctx.commit('addingMenu', new_menu.data);
            const menus = await axios.get('api/v1/menus/');
            ctx.commit('updateMenus', menus.data)
        },
        async deleteMenu(ctx, id){
            await axios.delete('api/v1/menus/'+id);
            const menus = await axios.get('api/v1/menus/');
            ctx.commit('updateMenus', menus.data)
        },
        async getMenusDishes(ctx, form){
            const menus_dishes = await axios.post('api/v1/menus-dishes/index/', form);
            ctx.commit('updateMenusDishes', menus_dishes.data)
        },
        async getNewMenuDishes(ctx, form){
            await axios.post('api/v1/menus-dishes/store', form);

            const menus_dishes = await axios.post('api/v1/menus-dishes/index/', form);
            ctx.commit('updateMenusDishes', menus_dishes.data)
        },
        async deleteMenuDishes(ctx, id){
            await axios.delete('api/v1/menus-dishes/'+id);
            ctx.commit('updateMenusDishes', menus_dishes.data)
        },
    },
}
