<template>
  <div style="width:90%; margin: 0 auto;">

    <h1 class="text-center">Работа с меню</h1>
      <form @submit.prevent="menusDishesIndex()">
          <div class="row">
              <div class="col-4">
                  <label for="menu_id"><b>Меню</b></label>
                  <select id="menu_id" class="form-control" v-model="form.menu_id">
                      <option v-for="(menu, index) in allMenus" :key="index" :value="menu.id">
                          {{menu.name}}
                      </option>
                  </select>
              </div>
              <div class="col-4">
                  <label for="day_id"><b>Дни</b></label>
                  <select id="day_id" class="form-control" v-model="form.day_id">
                      <option v-for="(day, index) in days" :key="index" :value="index">
                          {{day}}
                      </option>
                  </select>
              </div>
              <div class="col-4">
                  <label for="nutrition_id"><b>Приемы пищи</b></label>
                  <select id="nutrition_id" class="form-control" v-model="form.nutrition_id">
                      <option v-for="(nutrition, index) in nutritions" :key="index" :value="index">
                          {{nutrition}}
                      </option>
                  </select>
              </div>
          </div>
          <button class="btn btn-success mt-4 justify-content-center">Посмотреть</button>
          {{post}}
      </form>
</div>
</template>

<script>
//import addMenu from './AddMenu'
import {mapGetters, mapActions} from 'vuex'
import {VueSuggestion} from 'vue-suggestion'
import 'vue-suggestion/dist/vue-suggestion.css'

export default{
    //components:{addMenu},
    data:function(){
        return {
            post:null,
            nutritions:null,
            days:null,
            form:{
                menu_id: 2,
                day_id:'',
                nutrition_id:'',
            },
        }
    },
    computed: mapGetters(['allMenus']),
    methods:{
        ...mapActions(['getMenus']),
        menusDishesIndex(){
            this.post = this.form.day_id;
        },
        getNutritions(){
            axios.get('api/menus-dishes/nutritions/' + this.form.menu_id)
                .then(response => {
                    this.nutritions = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        getDays(){
            axios.get('api/menus-dishes/days/' + this.form.menu_id)
                .then(response => {
                    this.days = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

    async created(){
        this.getMenus();
        this.getNutritions();
        this.getDays();
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
