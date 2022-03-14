<template>
  <div>
    <form @submit.prevent="saveProduct()">
    <label for="name"><b>Название продукта</b></label>
    <input id="name" class="form-control" type="text" v-model="form.name"
        :class="{invalid: ($v.form.name.$dirty && !$v.form.name.required)}">
        <small class="helper-text invalid" v-if="$v.form.name.$dirty && !$v.form.name.required">
            Введите название продукта
        </small>

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
    <small class="helper-text invalid" v-if="$v.form.products_categories_id.$dirty && !$v.form.products_categories_id.required">
        Введите категорию блюда
    </small>

    <label for="sort"><b>Сортировка</b></label>
    <input id="sort" class="form-control" type="text" v-model="form.sort">
    <small class="helper-text invalid" v-if="$v.form.sort.$dirty && !$v.form.sort.required">
        Введите значение сортировки
    </small>

    <label for="water"><b>Вода</b></label>
    <input id="water" class="form-control" type="text" v-model="form.water">
    <small class="helper-text invalid" v-if="$v.form.water.$dirty && !$v.form.water.required">
        Введите количество воды
    </small>

    <label for="protein"><b>Белки</b></label>
    <input id="protein" class="form-control" type="text" v-model="form.protein">
    <small class="helper-text invalid" v-if="$v.form.protein.$dirty && !$v.form.protein.required">
        Введите количество белков
    </small>

    <label for="fat"><b>Жиры</b></label>
    <input id="fat" class="form-control" type="text" v-model="form.fat">
    <small class="helper-text invalid" v-if="$v.form.fat.$dirty && !$v.form.fat.required">
        Введите количество жиров
    </small>


    <button class="btn btn-success">Сохранить продукт</button>
    </form>
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
import {email, minLength, required} from "vuelidate/lib/validators";
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
            this.$v.form.$touch();
            if(this.$v.form.$error){
                console.log('Form submitted')
            }else{
                this.getNewProduct({
                    form: this.form
                });
                this.$bvModal.hide('modal-1')

            }
        },
    },
    validations: {
        form:{
            name: {required},
            products_categories_id: {required},
            sort: {required},
            water: {required},
            protein: {required},
            fat: {required},
        }

    },
    async created(){
        this.getProductsCategory();
    },

}
</script>
<style scoped>
    input:invalid {
        border-color: red;
    }
    small > .invalid {
        color: red;
    }
</style>
