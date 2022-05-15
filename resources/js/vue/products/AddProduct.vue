<template>
  <div>
    <form @submit.prevent="saveProduct()">
        <div class="blocks">
            <div class="block">
                <label for="name"><b>Название продукта</b></label>
                <input autocomplete="off" id="name" class="form-control" type="text" v-model="form.name"
                       :class="{invalid: ($v.form.name.$dirty && !$v.form.name.required)}">
                <small class="helper-text invalid" v-if="$v.form.name.$dirty && !$v.form.name.required">
                    Поле не может быть пустым!
                </small>
            </div>
            <div class="block">
                <label for="recipes_collection_id"><b>Категория продукта</b></label>
                <select id="recipes_collection_id" class="form-control"
                        v-model="form.category_id">
                    <option v-for="(category, index) in productsCategory"
                            :key="index"
                            :value="category.id"
                    >
                        {{category.name}}
                    </option>
                </select>
                <small class="helper-text invalid" v-if="$v.form.category_id.$dirty && !$v.form.category_id.required">
                    Поле не может быть пустым!
                </small>
            </div>
        </div>

        <div class="blocks mt-3">
            <div class="block">
                <label for="water"><b>Вода</b></label>
                <input autocomplete="off" id="water" class="form-control" type="text" v-model="form.water"
                       :class="{invalid: ($v.form.water.$dirty && (!$v.form.water.required || !$v.form.water.decimal))}">
                <small class="helper-text invalid" v-if="$v.form.water.$dirty && !$v.form.water.required">
                    Поле не может быть пустым!
                </small>
                <small class="helper-text invalid" v-if="$v.form.water.$dirty && !$v.form.water.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
            <div class="block">
                <label for="protein"><b>Белки</b></label>
                <input autocomplete="off" id="protein" class="form-control" type="text" v-model="form.protein"
                       :class="{invalid: ($v.form.protein.$dirty && (!$v.form.protein.required || !$v.form.protein.decimal))}">
                <small class="helper-text invalid" v-if="$v.form.protein.$dirty && !$v.form.protein.required">
                    Поле не может быть пустым!
                </small>
                <small class="helper-text invalid" v-if="$v.form.protein.$dirty && !$v.form.protein.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
            <div class="block">
                <label for="fat"><b>Жиры</b></label>
                <input autocomplete="off" id="fat" class="form-control" type="text" v-model="form.fat"
                       :class="{invalid: ($v.form.fat.$dirty && (!$v.form.fat.required || !$v.form.fat.decimal))}">
                <small class="helper-text invalid" v-if="$v.form.fat.$dirty && !$v.form.fat.required">
                    Поле не может быть пустым!
                </small>
                <small class="helper-text invalid" v-if="$v.form.fat.$dirty && !$v.form.fat.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
            <div class="block">
                <label for="carbohydrates_total"><b>Углеводы, г</b></label>
                <input autocomplete="off" id="carbohydrates_total" class="form-control" type="text" v-model="form.carbohydrates_total"
                       :class="{invalid: ($v.form.carbohydrates_total.$dirty && (!$v.form.carbohydrates_total.required || !$v.form.carbohydrates_total.decimal))}">
                <small class="helper-text invalid" v-if="$v.form.carbohydrates_total.$dirty && !$v.form.carbohydrates_total.required">
                    Поле не может быть пустым!
                </small>
                <small class="helper-text invalid" v-if="$v.form.carbohydrates_total.$dirty && !$v.form.carbohydrates_total.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
        </div>

        <p class="mt-3"><b>МИКРОЭЛЕМЕНТЫ</b></p>
        <div class="blocks">
            <div class="block">
                <label for="na"><b>Натрий, мг</b></label>
                <input autocomplete="off" id="na" class="form-control" type="text" v-model="form.na"
                       :class="{invalid: ($v.form.na.$dirty && !$v.form.na.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.na.$dirty && !$v.form.na.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
            <div class="block">
                <label for="k"><b>Калий, мг</b></label>
                <input autocomplete="off" id="k" class="form-control" type="text" v-model="form.k"
                       :class="{invalid: ($v.form.k.$dirty && !$v.form.k.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.k.$dirty && !$v.form.k.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
            <div class="block">
                <label for="ca"><b>Кальций, мг</b></label>
                <input autocomplete="off" id="ca" class="form-control" type="text" v-model="form.ca"
                       :class="{invalid: ($v.form.ca.$dirty && !$v.form.ca.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.ca.$dirty && !$v.form.ca.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
        </div>
        <div class="blocks">
            <div class="block">
                <label for="mg"><b>Магний, мг</b></label>
                <input autocomplete="off" id="mg" class="form-control" type="text" v-model="form.mg"
                       :class="{invalid: ($v.form.mg.$dirty && !$v.form.mg.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.mg.$dirty && !$v.form.mg.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
            <div class="block">
                <label for="p"><b>Фосфор, мг</b></label>
                <input autocomplete="off" id="p" class="form-control" type="text" v-model="form.p"
                       :class="{invalid: ($v.form.p.$dirty && !$v.form.p.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.p.$dirty && !$v.form.p.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
            <div class="block">
                <label for="fe"><b>Железо, мг</b></label>
                <input autocomplete="off" id="fe" class="form-control" type="text" v-model="form.fe"
                       :class="{invalid: ($v.form.fe.$dirty && !$v.form.fe.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.fe.$dirty && !$v.form.fe.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
        </div>
        <div class="blocks">
            <div class="block">
                <label for="i"><b>Йод, мг</b></label>
                <input autocomplete="off" id="i" class="form-control" type="text" v-model="form.i"
                       :class="{invalid: ($v.form.i.$dirty && !$v.form.i.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.i.$dirty && !$v.form.i.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
            <div class="block">
                <label for="se"><b>Селен, мг</b></label>
                <input autocomplete="off" id="se" class="form-control" type="text" v-model="form.se"
                       :class="{invalid: ($v.form.se.$dirty && !$v.form.se.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.se.$dirty && !$v.form.se.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
        </div>

        <p class="mt-3"><b>ВИТАМИНЫ</b></p>
        <div class="blocks">
            <div class="block">
                <label for="vitamin_a"><b>Витамин А, мг</b></label>
                <input autocomplete="off" id="vitamin_a" class="form-control" type="text" v-model="form.vitamin_a"
                       :class="{invalid: ($v.form.vitamin_a.$dirty && !$v.form.vitamin_a.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.vitamin_a.$dirty && !$v.form.vitamin_a.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
            <div class="block">
                <label for="vitamin_b1"><b>Витамин B1, мг</b></label>
                <input autocomplete="off" id="vitamin_b1" class="form-control" type="text" v-model="form.vitamin_b1"
                       :class="{invalid: ($v.form.vitamin_b1.$dirty && !$v.form.vitamin_b1.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.vitamin_b1.$dirty && !$v.form.vitamin_b1.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
            <div class="block">
                <label for="vitamin_b2"><b>Витамин B2, мг</b></label>
                <input autocomplete="off" id="vitamin_b2" class="form-control" type="text" v-model="form.vitamin_b2"
                       :class="{invalid: ($v.form.vitamin_b2.$dirty && !$v.form.vitamin_b2.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.vitamin_b2.$dirty && !$v.form.vitamin_b2.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
        </div>
        <div class="blocks">
            <div class="block">
                <label for="vitamin_c"><b>Витамин C, мг</b></label>
                <input autocomplete="off" id="vitamin_c" class="form-control" type="text" v-model="form.vitamin_c"
                       :class="{invalid: ($v.form.vitamin_c.$dirty && !$v.form.vitamin_c.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.vitamin_c.$dirty && !$v.form.vitamin_c.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
            <div class="block">
                <label for="vitamin_d"><b>Витамин D, мг</b></label>
                <input autocomplete="off" id="vitamin_d" class="form-control" type="text" v-model="form.vitamin_d"
                       :class="{invalid: ($v.form.vitamin_d.$dirty && !$v.form.vitamin_d.decimal)}">
                <small class="helper-text invalid" v-if="$v.form.vitamin_d.$dirty && !$v.form.vitamin_d.decimal">
                    Значение поля должно быть числовым или дробным!
                </small>
            </div>
        </div>

        <div class="blocks mt-3 text-center">
            <button class="btn btn-success" style="width:100%">Сохранить продукт</button>
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
            products_category:'',
            form:{
                name:'',
                category_id:'',
                water:'',
                protein:'',
                fat:'',
                carbohydrates_total:'',
                na:'',
                k:'',
                ca:'',
                mg:'',
                p:'',
                fe:'',
                i:'',
                se:'',
                vitamin_a:'',
                vitamin_b1:'',
                vitamin_b2:'',
                vitamin_c:'',
                vitamin_d:'',
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
                })
                .then(response => {
                    this.flashMessage.success({
                        title: 'Данные сохранены',
                        message: 'Продукт добавлен в список',
                        time: 3000,
                    });
                });
                this.$bvModal.hide('modal-1')

            }
        },
    },
    validations: {
        form:{
            name: {required},
            category_id: {required},
            water: {required, decimal},
            protein: {required, decimal},
            fat: {required, decimal},
            carbohydrates_total: {required, decimal},
            na: {decimal},
            k: {decimal},
            ca: {decimal},
            mg: {decimal},
            p: {decimal},
            fe: {decimal},
            i: {decimal},
            se: {decimal},
            vitamin_a: {decimal},
            vitamin_b1: {decimal},
            vitamin_b2: {decimal},
            vitamin_c: {decimal},
            vitamin_d: {decimal},
        }

    },
    async created(){
        this.getProductsCategory();
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
    }
    .block:not(:last-child) {
        margin-right: 20px;
    }
</style>
