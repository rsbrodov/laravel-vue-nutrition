<template>
  <div>
    <form @submit.prevent="saveProduct()">
    <label for="name"><b>Название продукта</b></label>
    <input id="name" class="form-control" type="text" v-model="form.name">

    <label for="products_categories_id"><b>Категория блюда</b></label>
    <select id="products_categories_id" class="form-control"
         v-model="form.products_categories_id">
        <option v-for="(category, index) in productsCategory"
        :key="index"
        :value="category.id"
        >
            {{category.name}}
        </option>
    </select>

    <label for="sort"><b>Сортировка</b></label>
    <input id="sort" class="form-control" type="text" v-model="form.sort">

    <label for="water"><b>Вода</b></label>
    <input id="water" class="form-control" type="text" v-model="form.water">

    <label for="protein"><b>Белки</b></label>
    <input id="protein" class="form-control" type="text" v-model="form.protein">

    <label for="fat"><b>Жиры</b></label>
    <input id="fat" class="form-control" type="text" v-model="form.fat">


    <button class="btn btn-success" @click="$bvModal.hide('modal-1')">Сохранить продукт</button>
    </form>
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
export default{
    data: function(){
        return {
            products_category:'',
            form:{
                name:'',
                products_categories_id:'',
                sort:'',
                water:'',
                protein:'',
                fat:'',
            },
        }
    },
    computed: mapGetters(['productsCategory', 'newProduct']),
    methods:{
        ...mapActions(['getNewProduct', 'getProductsCategory']),
        saveProduct(){
            this.getNewProduct({
                form: this.form
            });
        },
    },
    async created(){
        this.getProductsCategory();
    },

}
</script>
