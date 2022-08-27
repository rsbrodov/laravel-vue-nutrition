export default{
    state: {
        products:'',
        new_product:'',
        products_category:'',
    },
    getters: {
        allProducts(state){
            return state.products
        },
        newProduct(state){
            return state.new_product
        },
        productsCategory(state){
            return state.products_category
        },
    },
    mutations: {
        updateProducts(state, products){
            state.products = products
        },
        addingProduct(state, newProduct){
            state.products.unshift(newProduct)
        },
        updateProductsCategory(state, products_category){
            state.products_category = products_category
        },
    },
    actions: {
        async getProducts({commit}){
            commit('setLoading', true);
            await axios.get('api/v1/products/')
            .then(response => {
                commit('updateProducts', response.data)
            })
            .catch(err => {
                console.log(err)
            })
            .finally(() => {
                commit('setLoading', false);
            });
        },
        async getNewProduct(ctx, form){
            const new_dish = await axios.post('api/v1/products/store', form);
            ctx.commit('addingProduct', new_dish.data)
            const products = await axios.get('api/v1/products/')
            ctx.commit('updateProducts', products.data)
        },
        async deleteProduct(ctx, id){
            await axios.delete('api/v1/products/'+id)
            const products = await axios.get('api/v1/products/')
            ctx.commit('updateProducts', products.data)
        },
        async getProductsCategory(ctx){
            const products_category = await axios.get('api/v1/products/products-category')
            ctx.commit('updateProductsCategory', products_category.data)
        },
    },
}
