export default{
    state: {
        dishes_categories: '',
        recipes_collections: '',
        my_dishes: '',
        culinary_processings_id:'',
        one_dish: '',
        products_of_dish:'',
    },
    getters: {
        allDishesCategories(state){
            return state.dishes_categories
        },
        myDishes(state){
            return state.my_dishes
        },
        myRecipesCollections(state){
            return state.recipes_collections
        },
        allCulinaryProcessings(state){
            return state.culinary_processings_id
        },
        oneDish(state){
            return state.one_dish
        },
        productsOfDish(state){
            return state.products_of_dish
        },

    },
    mutations: {
        updateDishesCategories(state, dishes_categories){
            state.dishes_categories = dishes_categories
        },
        updateMyDishes(state, my_dishes){
            state.my_dishes = my_dishes
        },
        updateMyRecipesCollections(state, my_recipes_collections){
            state.recipes_collections = my_recipes_collections
        },
        updateCulinaryProcessings(state, culinary_processings_id){
            state.culinary_processings_id = culinary_processings_id
        },
        addingDish(state, newDish){
            state.my_dishes.unshift(newDish)
        },
        updateOneDish(state, newDish){
            state.one_dish = newDish
        },
        updateProductsDish(state, products_of_dish){
            state.products_of_dish = products_of_dish
        },

    },
    actions: {
        async getDishesCategories(ctx){
            const dishes_categories = await axios.get('api/dishes/dishes-categories')
            ctx.commit('updateDishesCategories', dishes_categories.data)
        },
        async getMyDishes(ctx){
            const my_dishes = await axios.get('api/dishes/')
            ctx.commit('updateMyDishes', my_dishes.data)
        },
        async getMyRecipesCollections(ctx){
            const my_recipes_collections = await axios.get('api/dishes/recipes-collections')
            ctx.commit('updateMyRecipesCollections', my_recipes_collections.data)
        },
        async getCulinaryProcessings(ctx){
            const culinary_processings_id = await axios.get('api/dishes/culinary-processings')
            ctx.commit('updateCulinaryProcessings', culinary_processings_id.data)
        },
        async newDish(ctx, form){
            const new_dish = await axios.post('api/dishes/store', form)
            ctx.commit('addingDish', new_dish.data)
            const my_dishes = await axios.get('api/dishes/')
            ctx.commit('updateMyDishes', my_dishes.data)
        },
        async deleteDish(ctx, id){
            await axios.delete('api/dishes/'+id)
            const my_dishes = await axios.get('api/dishes/')
            ctx.commit('updateMyDishes', my_dishes.data)
        },
        async copyDish(ctx, id){
            await axios.post('api/dishes/copy-dish/'+id)
            const my_dishes = await axios.get('api/dishes/')
            ctx.commit('updateMyDishes', my_dishes.data)
        },
        async getOneDish(ctx, id){
            const one_dish = await axios.post('api/dishes/one-dish/'+id)
            ctx.commit('updateOneDish', one_dish.data)
        },

        async getProductsDish(ctx, id){
            const products_of_dish = await axios.post('api/dishes-products/products-dish/'+id)
            ctx.commit('updateProductsDish', products_of_dish.data)
        },

    },
}