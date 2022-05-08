<template>
  <div style="width:90%; margin: 0 auto;">

    <h1 class="text-center">Список продуктов</h1>
      <b-button v-b-modal.modal-1 variant="success" class="mb-4">Создать новый продукт</b-button>
      <b-modal id="modal-1" class="mb-4" size="lg" title="Добавление нового продукта" >
          <addProduct/>
      </b-modal>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Название</th>
        <th scope="col" class="text-center">Категория</th>
        <th scope="col" class="text-center">Вода</th>
        <th scope="col" class="text-center">Белки</th>
        <th scope="col" class="text-center">Жиры</th>
      </tr>
    </thead>
    <tbody>
          <tr v-for="(myProduct, index) in allProducts" :key="index">
              <td>{{myProduct.id}}</td>
              <td>{{myProduct.name}}</td>
              <td>{{myProduct.products_categories.name}}</td>
              <td>{{myProduct.water}}</td>
              <td>{{myProduct.protein}}</td>
              <td>{{myProduct.fat}}</td>
              <td class="text-center"><b-button variant="danger" @click="removeProducts(myProduct.id)">
                  <font-awesome-icon icon="trash"/>
              </b-button></td>
          </tr>
  </tbody>
</table>
</div>
</template>

<script>
import addProduct from './AddProduct'
import {mapGetters, mapActions} from 'vuex'
import {VueSuggestion} from 'vue-suggestion'
import 'vue-suggestion/dist/vue-suggestion.css'

export default{
    components:{addProduct},
    data:function(){
        return {
        }
    },
    computed: mapGetters(['allProducts']),
    methods:{
        ...mapActions(['getProducts', 'deleteProduct']),
        removeProducts(id){
            this.deleteProduct(id)
        }

    },

    async created(){
        this.getProducts()
    },
}

</script>
<style scope>
  .vue-suggestion .vs__list {
    width: 100%;
    text-align: left;
    border: none;
    border-top: none;
    max-height: 400px;
    overflow-y: auto;
    border-bottom: 1px solid #023d7b;
    position: relative;
  }
  .vue-suggestion .vs__list .vs__list-item {
    background-color: #fff;
    padding: 10px;
    border-left: 1px solid #023d7b;
    border-right: 1px solid #023d7b;
  }
  .vue-suggestion .vs__list .vs__list-item:last-child {
    border-bottom: none;
  }
  .vue-suggestion .vs__list .vs__list-item:hover {
    background-color: #eee !important;
  }
  .vue-suggestion .vs__list,
  .vue-suggestion .vs__loading {
    position: absolute;
  }
  .vue-suggestion .vs__list .vs__list-item {
    cursor: pointer;
  }
  .vue-suggestion .vs__list .vs__list-item.vs__item-active {
    background-color: #f3f6fa;
  }
</style>
