<template>
  <div>
    <form @submit.prevent="saveMenu()">
    <label for="name"><b>Название меню</b></label>
    <input id="name" class="form-control" type="text" v-model="form.name"
        :class="{invalid: ($v.form.name.$dirty && !$v.form.name.required)}">
        <small class="helper-text invalid" v-if="$v.form.name.$dirty && !$v.form.name.required">
            Введите название меню
        </small>


    <label for="sort"><b>Количество недель в меню</b></label>
    <input id="sort" class="form-control" type="text" v-model="form.cycle">
    <small class="helper-text invalid" v-if="$v.form.cycle.$dirty && !$v.form.cycle.required">
        Введите количество недель
    </small>

    <button class="btn btn-success">Сохранить меню</button>
    </form>
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
import {required} from "vuelidate/lib/validators";
export default{
    data: function(){
        return {
            form:{
                name:'',
                cycle:'',
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
                });
                this.$bvModal.hide('modal-1')

            }
        },
    },
    validations: {
        form:{
            name: {required},
            cycle: {required},
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
