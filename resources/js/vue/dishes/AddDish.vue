<template>
  <div>
    <form @submit.prevent="saveDish()">
    <label for="name"><b>Название блюда</b></label>
    <input id="name" class="form-control" type="text" v-model="form.name">

    <label for="dishes_categories_id"><b>Категория блюда</b></label>
    <select id="dishes_categories_id" class="form-control"
         v-model="form.dishes_categories_id">
        <option v-for="(category, index) in allDishesCategories" 
        :key="index" 
        :value="category.id"
        >
            {{category.name}}
        </option>
    </select>

    <label for="recipes_collection_id"><b>Сборник рецептур</b></label>
    <select id="recipes_collection_id" class="form-control"
         v-model="form.recipes_collections_id">
        <option v-for="(recipes_collection, index) in myRecipesCollections" 
        :key="index" 
        :value="recipes_collection.id"
        >
            {{recipes_collection.name}}
        </option>
    </select>

    <label for="description"><b>Технология приготовления</b></label>
    <input id="description" class="form-control" type="text" v-model="form.description">

    <label for="culinary_processings_id"><b>Процесс приготовления</b></label>
    <select id="culinary_processings_id" class="form-control"
         v-model="form.culinary_processings_id">
        <option v-for="(culinary_processings_id, index) in allCulinaryProcessings" 
        :key="index" 
        :value="culinary_processings_id.id"
        >
            {{culinary_processings_id.name}}
        </option>
    </select>

    <label for="yield"><b>Выход в граммах</b></label>
    <input id="yield" class="form-control" type="text" v-model="form.yield">

    <label for="dishes_characters"><b>Характеристика блюда</b></label>
    <input id="dishes_characters" class="form-control" type="text" v-model="form.dishes_characters">

    <label for="techmap_number"><b>Номер техкарты</b></label>
    <input id="techmap_number" class="form-control" type="text" v-model="form.techmap_number">

    <button class="btn btn-success" @click="$bvModal.hide('modal-1')">Сохранить блюдо</button>
    </form>
    
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
export default{
    data: function(){
        return {
            form:{
                name:'',
                dishes_categories_id:'',
                recipes_collections_id:'',
                description:'',
                culinary_processings_id:'',
                yield:'',
                dishes_characters:'',
                techmap_number:'',
            },
        }
    },
    computed: mapGetters(['myDishes', 'allDishesCategories', 'myRecipesCollections', 'allCulinaryProcessings']),
    methods:{
        ...mapActions(['getDishesCategories', 'getMyRecipesCollections', 'getCulinaryProcessings', 'newDish']),
        saveDish(){
            this.newDish({
                form: this.form
            });
        }, 
        async getCuli(){
            this.culinar = await axios.get('api/dishes/culinary-processings')
        }
    },
    async created(){
        this.getDishesCategories();
        this.getMyRecipesCollections();
        this.getCulinaryProcessings();
        //this.getCuli();
    },
    
}
</script>
