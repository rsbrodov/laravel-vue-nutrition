<template>
  <div style="width:90%; margin: 0 auto;">

    <h1 class="text-center">Разработка блюд</h1>

    <b-button v-b-modal.modal-1 variant="success" class="mb-4">Создать новое блюдо</b-button>

    <b-modal id="modal-1" class="mb-4" size="lg" title="Добавление нового блюда" >
        <addDish @close-modal="closeModal('dishCreate')"></addDish>
    </b-modal>


    <b-modal id="modal-2" size="lg" title="Добавление продуктов в блюдо" >

            <p v-if="oneDish">{{oneDish[0].name}}</p>
            <div v-if="productsOfDish">
              <table class="table">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Продукт</th>
                  <th scope="col">Вес брутто</th>
                  <th scope="col">Вес нетто</th>
                  <th scope="col">Дата добавления</th>
                </tr>
                </thead>
                <tbody>
                  <tr v-for="(product, index) in productsOfDish" :key="index">
                    <td>1</td>
                    <td>{{product.products.name}}</td>
                    <td>{{product.net_weight}}</td>
                    <td>{{product.gross_weight}}</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
                <p class="text-center">Добавление продуктов в блюдо</p>
                 <form id="dataForm" @submit.prevent="addProduct()">
                     <div class="row">
                         <div class="col-4">
                             <label for="products_id"><b>Выберите продукт</b></label>
                             <select id="products_id" class="form-control" v-model="form.products_id">
                                 <option v-for="(product, index) in allProducts" :key="index" :value="product.id">{{product.name}}</option>
                             </select>
                         </div>
                         <div class="col-4">
                             <label for="gross_weight"><b>Масса брутто</b></label>
                             <input id="gross_weight" class="form-control" type="text" v-model="form.gross_weight">
                         </div>
                         <div class="col-4">
                             <label for="net_weight"><b>Масса нетто</b></label>
                             <input id="net_weight" class="form-control" type="text" v-model="form.net_weight">
                         </div>
                     </div>
                     <button class="btn btn-success mt-3">Добавить</button>
                 </form>
            </div>
    </b-modal>

    <table class="table table-bordered">
      <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Название</th>
        <th scope="col" class="text-center">Категория</th>
        <th scope="col" class="text-center">Сборник</th>
        <th scope="col" class="text-center">Выход</th>
        <th scope="col" class="text-center">Номер техкарты</th>
        <th scope="col" colspan="4" class="text-center">Управление</th>
      </tr>
    </thead>
    <tbody>
          <Dish v-for="(myDish, index) in myDishes" :key="index"
          :dish="myDish"
          @addProductsDish="addProductsDish"/>
  </tbody>
</table>

</div>
</template>

<script>
import addDish from './AddDish'
import Dish from './Dish'
import {mapGetters, mapActions} from 'vuex'
import {VueSuggestion} from 'vue-suggestion'
import 'vue-suggestion/dist/vue-suggestion.css'

export default{
    components:{addDish, Dish, VueSuggestion},
    data:function(){
        return {
            form:{
                products_id:null,
                dishes_id:null,
                net_weight:null,
                gross_weight:null,
            }

        }
    },
    computed: mapGetters(['myDishes', 'oneDish', 'productsOfDish', 'allProducts']),
    methods: {
        ...mapActions(['getMyDishes', 'getOneDish', 'getProductsDish', 'getProducts', 'newProductsDish']),
        addProductsDish(e) {
            this.getOneDish(e);
            this.getProductsDish(e);

            this.$bvModal.show('modal-2')
        },
        addProduct() {
            this.form.dishes_id = this.oneDish[0].id;
            this.newProductsDish({
                form: this.form
            }).then(response => {
                this.form.products_id = '';
                this.form.net_weight = '';
                this.form.gross_weight = '';
            }).catch(error => {
                console.log(error);
            });
            //this.$bvModal.hide('modal-2')

        },
        closeModal(id){
            this.$bvModal.hide('modal-1')
        }
    },



    async created(){
      this.getMyDishes();
      this.getProducts();
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
