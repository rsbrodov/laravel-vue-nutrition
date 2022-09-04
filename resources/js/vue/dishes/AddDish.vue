<template>
  <div>
    <form @submit.prevent="saveDish()">
        <div class="blocks mt-3">
            <div class="block col-5">
                <label for="name"><b>Название блюда</b></label>
                <input autocomplete="off" id="name" class="form-control" type="text" v-model="form.name"
                    :class="{invalid: ($v.form.name.$dirty && !$v.form.name.required)}">
                <small class="helper-text invalid" v-if="$v.form.name.$dirty && !$v.form.name.required">
                    Поле не может быть пустым!
                </small>
            </div>
            <div class="block col-5">
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
                <small class="helper-text invalid" v-if="$v.form.dishes_categories_id.$dirty && !$v.form.dishes_categories_id.required">
                    Поле не может быть пустым!
                </small>
            </div>
        </div>

        <div class="blocks mt-3">
            <div class="block col-5">
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
                <small class="helper-text invalid" v-if="$v.form.recipes_collections_id.$dirty && !$v.form.recipes_collections_id.required">
                    Поле не может быть пустым!
                </small>
            </div>
            <div class="block col-5">
                <label for="description"><b>Технология приготовления</b></label>
                <input autocomplete="off" id="description" class="form-control" type="text" v-model="form.description"
                    :class="{invalid: ($v.form.description.$dirty && !$v.form.description.required)}">
                <small class="helper-text invalid" v-if="$v.form.description.$dirty && !$v.form.description.required">
                    Поле не может быть пустым!
                </small>
            </div>
        </div>

        <div class="blocks mt-3">
            <div class="block col-5">
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
                <small class="helper-text invalid" v-if="$v.form.culinary_processings_id.$dirty && !$v.form.culinary_processings_id.required">
                    Поле не может быть пустым!
                </small>
            </div>
            <div class="block col-5">
                <label for="yield"><b>Выход в граммах</b></label>
                <input autocomplete="off" id="yield" class="form-control" type="text" v-model="form.yield"
                    :class="{invalid: ($v.form.yield.$dirty && (!$v.form.yield.required || !$v.form.yield.decimal))}">
                <small class="helper-text invalid" v-if="$v.form.yield.$dirty && !$v.form.yield.required">
                    Поле не может быть пустым!
                </small>
                <small class="helper-text invalid" v-if="$v.form.yield.$dirty && !$v.form.yield.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
        </div>

        <div class="blocks mt-3">
            <div class="block col-5">
                <label for="dishes_characters"><b>Характеристика блюда</b></label>
                <input autocomplete="off" id="dishes_characters" class="form-control" type="text" v-model="form.dishes_characters"
                    :class="{invalid: ($v.form.dishes_characters.$dirty && !$v.form.dishes_characters.required)}">
                <small class="helper-text invalid" v-if="$v.form.dishes_characters.$dirty && !$v.form.dishes_characters.required">
                    Поле не может быть пустым!
                </small>
            </div>
            <div class="block col-5">
                <label for="techmap_number"><b>Номер техкарты</b></label>
                <input autocomplete="off" id="techmap_number" class="form-control" type="text" v-model="form.techmap_number"
                       :class="{invalid: ($v.form.techmap_number.$dirty && (!$v.form.techmap_number.required || !$v.form.techmap_number.decimal))}">
                <small class="helper-text invalid" v-if="$v.form.techmap_number.$dirty && !$v.form.techmap_number.required">
                    Поле не может быть пустым!
                </small>
                <small class="helper-text invalid" v-if="$v.form.techmap_number.$dirty && !$v.form.techmap_number.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
        </div>
        <div class="blocks mt-3 text-center">
            <button class="btn main-button-green" style="width: 100%">Сохранить блюдо</button>
        </div>
    </form>

  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
import {email, minLength, required, decimal} from "vuelidate/lib/validators";
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
            this.$v.form.$touch();
            if(this.$v.form.$error){
                console.log('Form submitted')
            }else {
                this.newDish({
                    name: this.form.name, dishes_categories_id: this.form.dishes_categories_id, recipes_collections_id: this.form.recipes_collections_id,
                    description: this.form.description, culinary_processings_id: this.form.culinary_processings_id, yield: this.form.yield,
                    dishes_characters: this.form.dishes_characters, techmap_number: this.form.techmap_number
                    
                })
                    .then(response => {
                        this.flashMessage.success({
                            message: 'Блюдо успешно создано',
                            time: 3000,
                        });
                    });
                this.$emit('close-modal');
            }
        },
        async getCuli(){
            this.culinar = await axios.get('api/v1/dishes/culinary-processings')
        }
    },
    validations: {
        form: {
            name: {required},
            dishes_categories_id: {required},
            recipes_collections_id: {required},
            description: {required},
            culinary_processings_id: {required},
            dishes_characters: {required},
            techmap_number: {required, decimal},
            yield: {required, decimal},
        }
    },

    async created(){
        this.getDishesCategories();
        this.getMyRecipesCollections();
        this.getCulinaryProcessings();
    },

}
</script>
<style scoped>
    .invalid {
        border-color: red;
        color: red;
    }
    small .invalid {
        color: red;
    }
    .blocks{
        display: flex;
        justify-content: space-around;
    }
    /*.block:not(:last-child) {
        margin-right: 20px;
    }*/



    
</style>
