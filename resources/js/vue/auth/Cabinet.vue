<template>
    <div>
        <p>Имя пользователя: {{user.data.name}}</p>
        <p>Email: {{user.data.email}}</p>
        <p>Роль:</p>
        <p v-for="(role, index) in myRoles" :key="index">{{index}}</p>
            <div class="col-3">
                <button @click.prevent="logout()" class="form-control btn btn-danger rounded submit px-3">Выйти</button>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
export default {
    data:function(){
        return{
            user:null,
            roles:null,
        }
    },
    computed: mapGetters(['myRoles', 'myHeader_links']),
    methods:{
        ...mapActions(['getMyRoles', 'getMyHeaderLinks']),
        logout(){
            axios.post('api/logout')
            .then(() => {
                this.getMyHeaderLinks()
                this.$router.push('/login')
            })
            .catch(error =>{
                console.log(error);
            })
        },
    },
    async mounted(){
        axios.get('api/user')
        .then(response =>{
            this.user = response
        })
        .catch(error => {
            this.$router.push({ name: 'login' })
        });
        this.getMyRoles()
    }
}
</script>
<style scoped>
.has-error{
    border-color: red;

}
</style>
