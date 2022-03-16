<template>
  <div style="width:90%; margin: 0 auto;">

    <h1 class="text-center">Список меню</h1>
      <b-button v-b-modal.modal-1 variant="success" class="mb-4">Создать новое меню</b-button>
      <b-modal id="modal-1" class="mb-4" title="Добавление нового продукта" >
          <addMenu/>
      </b-modal>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Название</th>
        <th scope="col" class="text-center">Цикл</th>
      </tr>
    </thead>
    <tbody>
          <tr v-for="(myMenu, index) in allMenus" :key="index">
              <td>{{myMenu.id}}</td>
              <td>{{myMenu.name}}</td>
              <td>{{myMenu.cycle}}</td>
              <td class="text-center"><b-button variant="danger" @click="removeMenus(myMenu.id)">
                  <font-awesome-icon icon="trash"/>
              </b-button></td>
          </tr>
  </tbody>
</table>
</div>
</template>

<script>
import addMenu from './AddMenu'
import {mapGetters, mapActions} from 'vuex'
import {VueSuggestion} from 'vue-suggestion'
import 'vue-suggestion/dist/vue-suggestion.css'

export default{
    components:{addMenu},
    data:function(){
        return {
        }
    },
    computed: mapGetters(['allMenus']),
    methods:{
        ...mapActions(['getMenus', 'deleteMenu']),
        removeMenus(id){
            this.deleteMenu(id)
        }

    },

    async created(){
        this.getMenus()
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
