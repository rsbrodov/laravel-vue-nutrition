<template>
  <div style="width:90%; margin: 0 auto;">
    
    <h1 class="text-center">Разработка блюд</h1>
     
    <b-button v-b-modal.modal-1 variant="success" class="mb-4">Создать новое блюдо</b-button>

    <b-modal id="modal-1" class="mb-4" title="Добавление нового блюда" >
        <addDish/>
    </b-modal>

    <b-modal id="modal-2" title="Добавление продуктов в блюдо" >
        
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

                <!-- <form id="dataForm">
                <input id="inputId" list="dataListId" value="" v-model="selectProductId"  @change="onChange($event)" placeholder="Выберите продукт">
                <datalist id="dataListId" @change="onChange($event)">
                  <option v-for="(product, index) in allProducts" :key="index" :data-id="product.id">{{product.name}}</option>
                </datalist>
                <button id="submitButton" type="submit" @click="addProduct()">Submit</button>
                <div id="resultID" class="resultID"></div>
              </form> -->

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
          item: {},
        items: [
          { id: 1, name: 'Golden Retriever' },
          { id: 2, name: 'Cat' },
          { id: 3, name: 'Squirrel' },
        ],
        }
    },
    computed: mapGetters(['myDishes', 'oneDish', 'productsOfDish', 'allProducts']),
    methods:{
        ...mapActions(['getMyDishes', 'getOneDish', 'getProductsDish', 'getProducts']),
        addProductsDish(e){
          this.getOneDish(e);
          this.getProductsDish(e)
          
          this.$bvModal.show('modal-2')
        },
        addProduct(){
         
          var selectedOption = dataListId.options.namedItem(inputId.value);
          if (selectedOption) {
              var selectedId = selectedOption.getAttribute('data-id');
              var result = "Country ID: " + selectedId;
              console.log(selectedId);
          } else {
              var result = "No ID available for value: " + inputId.value;
          }
          document.getElementById('resultID').textContent = result; 
        console.log(123);
        },


        itemSelected(item) {
        this.item = item;
      },
      setLabel(item) {
        return item.name;
      },
      inputChange(text) {
        // your search method
        this.items = this.items.filter((item) => item.name.indexOf(text) > -1);
        // now `items` will be showed in the suggestion list
      },
      
      },



    async created(){
      this.getMyDishes()
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