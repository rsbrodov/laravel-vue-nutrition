<template>
    <div style="width:80%; margin: 0 auto;">
        <FlashMessage :position="'right top'"></FlashMessage>
        <h1 class="text-center">Работа с меню</h1>
        <form @submit.prevent="menusDishesIndex()">
            <div class="row">
                <div class="col-4">
                    <label for="menu_id"><b>Меню</b></label>
                    <select id="menu_id" class="form-control" @change="setFirstMenu" v-model="form.menu_id">
                        <option value="null" disabled selected hidden>Выберите меню...</option>
                        <option v-for="(menu, index) in allMenus" :key="index" :value="menu.id">
                            {{menu.name}}
                        </option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="days_id"><b>Дни</b></label>
                    <select id="days_id" class="form-control" v-model="form.days_id">
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
            <div class="blocks mt-3 text-center">
                <button class="btn main-button-green" style="width:100%">Посмотреть</button>
            </div>
        </form>


        <div class="container mt-5 mb-2" v-if="post">
            <div class="container">
                <p class="text-center" style="font-size: 20px;">Блюда в меню</p>
                <table class="fl-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Название блюда</th>
                        <th scope="col" class="text-center">Масса блюда</th>
                        <th scope="col" class="text-center">Управление</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="menusDishes.length === 0">
                        <td class="text-center text-danger" colspan="3"><b>Блюда в меню не добавлены</b></td>
                    </tr>
                    <tr v-else v-for="(mDish, index) in menusDishes" :key="index">
                        <td>{{mDish.id}}</td>
                        <td>{{mDish.dishes.name}}</td>
                        <td>{{mDish.yield}}</td>
                        <td class="text-center">
                            <b-button variant="danger" @click="removeMenuDishes(mDish.id)">
                                <font-awesome-icon icon="trash"/>
                            </b-button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <form @submit.prevent="menusDishesStore()">
                <div class="row">
                    <div class="col-4">
                        <label for="dishes_id"><b>Блюдо</b></label>
                        <select id="dishes_id" class="form-control" v-model="form.dishes_id">
                            <option v-for="(dish, index) in myDishes" :key="index" :value="dish.id">
                                {{dish.name}}
                            </option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="yield"><b>Выход в граммах</b></label>
                        <input id="yield" class="form-control" type="text" v-model="form.yield" autocomplete="off">
                    </div>
                    <div class="col-4">
                        <button class="btn main-button-green mt-4 justify-content-center">Добавить в меню</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
import {VueSuggestion} from 'vue-suggestion'
import 'vue-suggestion/dist/vue-suggestion.css'

export default{
    data:function(){
        return {
            post:null,
            nutritions:null,
            days:null,
            form:{
                menu_id: null,
                days_id:'',
                nutrition_id:'',
                dishes_id:null,
                yield:null,
            }
        }
    },
    computed: mapGetters(['myDishes','allMenus', 'menusDishes']),
    methods:{
        ...mapActions(['getMyDishes', 'getMenus', 'getNewMenuDishes', 'getMenusDishes', 'deleteMenuDishes']),
        menusDishesIndex(){
            this.getMyDishes();
            this.post = this.form.days_id;
            this.getMenusDishes({
                form: this.form
            })
                .then(response => {
                    console.log(response);
                })

        },
        setFirstMenu(){
            axios.get('api/v1/menus-dishes/nutritions/' + this.form.menu_id)
                .then(response => {
                    this.nutritions = response.data;
                    console.log('nutrition'+this.form.menu_id);
                })
                .catch(error => {
                    console.log(error);
                });


            axios.get('api/v1/menus-dishes/days/' + this.form.menu_id)
                .then(response => {
                    console.log('day'+this.form.menu_id);
                    this.days = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },

        menusDishesStore(){
            this.getNewMenuDishes({
                form: this.form
            })
            .then(response => {
                this.form.dishes_id = null;
                this.form.yield = null;
            })
        },
        removeMenuDishes(id){
            this.deleteMenuDishes(id)
        }
    },

    async created(){
        this.getMenus();
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
