<template>
    <div>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Регистрация</h2>
                    </div>
            </div>
            <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-5">
                        <div class="login-wrap">
                            <form autocomplete="off" @submit.prevent="register" method="post">
                                <div class="form-group" :class="{ 'has-error': error && errors.name }">
                                    <label for="name">Имя</label>
                                    <input type="text" id="name" class="form-control" v-model="form.name" required>
                                    <span class="help-block" v-if="errors.name">{{ errors.name }}</span>
                                </div>
                                <div class="form-group" :class="{ 'has-error': error && errors.email }">
                                    <label for="email">E-mail</label>
                                    <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="form.email" required>
                                    <span class="help-block" v-if="errors.email">{{ errors.email[0] }}</span>
                                </div>
                                <div class="form-group" :class="{ 'has-error': error && errors.password }">
                                    <label for="password">Пароль</label>
                                    <input type="password" id="password" class="form-control" v-model="form.password" required>
                                    <span class="help-block" v-if="errors.password">{{ errors.password }}</span>
                                </div>
                                <div class="form-group" :class="{ 'has-error': error && errors.password_confirmation }">
                                    <label for="password">Повтоирте пароль</label>
                                    <input type="password" id="password" class="form-control" v-model="form.password_confirmation" required>
                                    <span class="help-block text-danger" v-if="errors.password">{{ errors.password_confirmation }}</span>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3" @click.prevent="saveForm()">Зарегистрироваться</button>
                                </div>
                            </form>
                            {{errors}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

export default {
    data:function(){
        return{
            form:{
                name:'',
                email:'',
                password:'',
                password_confirmation:''
            },
            errors:[]
        }
    },
    methods:{
        saveForm(){
            console.log('send')
            axios.post('/register', this.form)
            .then(prevent =>{
                console.log('saved')
                this.$router.push({ name: 'login' })
            })
            .catch(error => {
                
            })
        }
    }
}
</script>
<style scoped>
.has-error{
    border-color: red;
    
}
</style>
