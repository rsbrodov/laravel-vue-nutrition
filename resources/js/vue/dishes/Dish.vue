<template>
    <tr><td scope="row" class="text-center">{{dish.id}}</td>
        <td>{{dish.name}}</td>
        <td class="text-center">{{dish.dishes_categories.name}}</td>
        <td class="text-center">{{dish.recipes_collections.name}}</td>
        <td class="text-center">{{dish.yield}}</td>
        <td class="text-center">{{dish.techmap_number}}</td>
        <td class="text-center"><b-button variant="danger" @click="removeDish()">
            <font-awesome-icon icon="trash"/>
        </b-button></td>

        <td class="text-center"><b-button variant="warnig" @click="$emit('addProductsDish', dish.id)">
           <font-awesome-icon icon="plus-square"/>
        </b-button></td>

        <td class="text-center"><b-button @click="copyDishClick()">
           <font-awesome-icon icon="copy"/>
        </b-button></td>

        
        
    </tr>
    
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
export default{
    props:['dish'],
    computed: mapGetters(['allDishesCategories', 'myRecipesCollections', 'allCulinaryProcessings']),
    methods:{
         ...mapActions(['deleteDish', 'copyDish']),
        removeDish(){
            console.log(this.dish.id)
            this.deleteDish(this.dish.id);
        },
        copyDishClick(){
            this.copyDish(this.dish.id);
        },
    }
}
</script>
