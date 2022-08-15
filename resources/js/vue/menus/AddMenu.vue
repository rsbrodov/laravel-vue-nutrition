<template>
  <div>
    <form @submit.prevent="saveMenu()">
    <label for="name"><b>Название меню</b></label>
    <input id="name" class="form-control" type="text" v-model="form.name"
        :class="{invalid: ($v.form.name.$dirty && !$v.form.name.required)}">
        <small class="helper-text invalid" v-if="$v.form.name.$dirty && !$v.form.name.required">
            Введите название меню
        </small>


    <div class="border-block" id="day-indicator">
        <p style="font-size: 18px;"><b>Дни меню <small>(отметьте нужные варианты галочками)</small></b></p>
        <div class="day-container">
            <p><input type="checkbox" name="days1" v-model="form.days1">Понедельник</p>
            <p><input type="checkbox" name="days2" v-model="form.days2">Вторник</p>
            <p><input type="checkbox" name="days3" v-model="form.days3">Среда</p>
            <p><input type="checkbox" name="days4" v-model="form.days4">Четверг</p>
            <p><input type="checkbox" name="days5" v-model="form.days5">Пятница</p>
            <p><input type="checkbox" name="days6" v-model="form.days6">Суббота</p>
            <p><input type="checkbox" name="days7" v-model="form.days7">Воскресенье</p>
        </div>
    </div>

    <div class="border-block">
        <p style="font-size: 18px;"><b>Приемы пищи <small>(отметьте нужные варианты галочками)</small></b></p>
        <div class="nutrition-container">
            <p><input type="checkbox" name="nutrition1" v-model="form.nutrition1">Завтрак</p>
            <p><input type="checkbox" name="nutrition2" v-model="form.nutrition2">Второй завтрак</p>
            <p><input type="checkbox" name="nutrition3" v-model="form.nutrition3">Обед</p>
            <p><input type="checkbox" name="nutrition4" v-model="form.nutrition4">Полдник</p>
            <p><input type="checkbox" name="nutrition5" v-model="form.nutrition5">Ужин</p>
            <p><input type="checkbox" name="nutrition6" v-model="form.nutrition6">Второй ужин</p>
        </div>
    </div>

    <!-- <button class="btn btn-success mt-4" style="margin:0 auto;">Сохранить меню</button> -->
    <div class="modal-footer">
        <button type="button" class="btn main-button-dark" @click="closeModal">Отмена</button>
        <button id="add" type="submit" class="btn main-button-green">Сохранить меню</button>
    </div>
    </form>
  </div>
</template>

<style>
    .day-container{
        display:flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }
    .nutrition-container{
        display:flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 5px;
    }
    .border-block{
        border:1px solid #ced4da;
        border-radius: 10px;
        margin-top: 25px;
        padding: 5px;
    }
</style>

<script>
import {mapGetters, mapActions} from 'vuex'
import {required} from "vuelidate/lib/validators";
export default{
    data: function(){
        return {
            form:{
                name:'',
                days1:'',
                days2:'',
                days3:'',
                days4:'',
                days5:'',
                days6:'',
                days7:'',
                nutrition1:'',
                nutrition2:'',
                nutrition3:'',
                nutrition4:'',
                nutrition5:'',
                nutrition6:'',
            },
        }
    },
    computed: mapGetters(['newMenu']),
    methods:{
        ...mapActions(['getNewMenu']),
        saveMenu(){
            this.$v.form.$touch();
            if(this.$v.form.$error){
                console.log('Form submitted')
            }else{
                this.getNewMenu({
                    form: this.form
                }).then(response => {
                    this.flashMessage.success({
                        message: 'Меню успешно создано',
                        time: 3000,
                    });
                });
                this.$bvModal.hide('modal-1')

            }
        },
        closeModal(){
            this.$bvModal.hide('modal-1')
        },
    },
    validations: {
        form:{
            name: {required},
        }

    },

}
</script>
<style scoped>
    input:invalid {
        border-color: red;
    }
    small > .invalid {
        color: red;
    }
</style>
