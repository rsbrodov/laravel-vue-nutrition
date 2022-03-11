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
        async getProducts(ctx){
            const products = await axios.get('api/products/')
            ctx.commit('updateProducts', products.data)
        },
        async getNewProduct(ctx, form){
            const new_dish = await axios.post('api/products/store', form)
            ctx.commit('addingProduct', new_dish.data)
            const products = await axios.get('api/products/')
            ctx.commit('updateProducts', products.data)
        },
        async deleteProduct(ctx, id){
            await axios.delete('api/products/'+id)
            const products = await axios.get('api/products/')
            ctx.commit('updateProducts', products.data)
        },
        async getProductsCategory(ctx){
            const products_category = await axios.get('api/products/products-category')
            ctx.commit('updateProductsCategory', products_category.data)
        },
    },
}
